<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact_index")
     */
    public function indexAction(SessionInterface $session, Request $request)
    {
        $form = $this->createForm('AppBundle\Form\ContactType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                        // User mail
                        $message = (new \Swift_Message('Confirmation envoi d\'email'))
                            ->setFrom('akyoswcs@gmail.com')
                            ->setTo($this->getUser()->getEmail())
                            ->setContentType('text/html')
                            ->setBody($this->renderView('email/confirmation.html.twig'));
                        $this->get('mailer')->send($message);

                        $this->addFlash('success', 'message.sent');

                        $data = $form->getData();

                        // DMS mail
                        $message = (new \Swift_Message('Nouveau message'))
                            ->setFrom('akyoswcs@gmail.com')
                            ->setTo('hvest.au@gmail.com')
                            ->setContentType('text/html')
                            ->setBody($this->renderView(
                                'email/mail.html.twig',
                                [ 'message' => $data['text'],
                                 'prenom' => $data['firstname'],
                                    'nom' => $data['name']
                                ]

                            ));
                        $this->get('mailer')->send($message);


                        return $this->redirectToRoute('dashboard');
        }
                    return $this->render('contact/index.html.twig', array(
                              'form' => $form->createView(),
                     ));
    }
}

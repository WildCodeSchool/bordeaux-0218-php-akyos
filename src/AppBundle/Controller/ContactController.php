<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact_index")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\ContactType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        // User mail
            $message = (new \Swift_Message('Confirmation envoi d\'email'))
            ->setFrom('akyoswcs@gmail.com')
            ->setTo($this->getUser()->getEmail())
            ->setContentType('text/html')
            ->setBody($this->renderView('email/content.html.twig'));
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('homepage');
        }
        return $this->render('contact/index.html.twig', array(
                  'form' => $form->createView(),
         ));
    }
}

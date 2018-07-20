<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Condominium;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Condominium controller.
 *
 * @Route("condominium")
 */
class CondominiumController extends Controller
{
    /**
     * Lists all condominium entities.
     *
     * @Route("/", name="condominium_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('AppBundle:Condominium');

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $condominium = $em->findAll();
        } else {
            $condominium = $em->findBy(['syndicate'=>$this->getUser()->getSyndicate()->getId()]);
        }

        return $this->render('condominium/index.html.twig', array(
            'condominia' => $condominium,
        ));
    }

    /**
     * Creates a new condominium entity.
     *
     * @Route("/new", name="condominium_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $condominium = new Condominium();
        $form = $this->createForm('AppBundle\Form\CondominiumType', $condominium);

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $form->add('syndicate');
        } else {
            $condominium->setSyndicate($this->getUser()->getSyndicate());
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
            $em->persist($condominium);
            $em->flush();

            return $this->redirectToRoute('condominium_show', array('id' => $condominium->getId()));
        }

        return $this->render('condominium/new.html.twig', array(
            'condominium' => $condominium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a condominium entity.
     *
     * @Route("/{id}", name="condominium_show")
     * @Method("GET")
     */
    public function showAction(Condominium $condominium)
    {
        $deleteForm = $this->createDeleteForm($condominium);

        return $this->render('condominium/show.html.twig', array(
            'condominium' => $condominium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing condominium entity.
     *
     * @Route("/{id}/edit", name="condominium_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Condominium $condominium)
    {
        $deleteForm = $this->createDeleteForm($condominium);
        $editForm = $this->createForm('AppBundle\Form\CondominiumType', $condominium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('condominium_edit', array('id' => $condominium->getId()));
        }

        return $this->render('condominium/edit.html.twig', array(
            'condominium' => $condominium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a condominium entity.
     *
     * @Route("/{id}", name="condominium_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Condominium $condominium)
    {
        $form = $this->createDeleteForm($condominium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($condominium);
            $em->flush();
        }

        return $this->redirectToRoute('condominium_index');
    }

    /**
     * Creates a form to delete a condominium entity.
     *
     * @param Condominium $condominium The condominium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Condominium $condominium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('condominium_delete', array('id' => $condominium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

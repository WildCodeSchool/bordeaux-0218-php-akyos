<?php

namespace AppBundle\Controller;

use AppBundle\Entity\InterventionSheet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Interventionsheet controller.
 *
 * @Route("interventionsheet")
 */
class InterventionSheetController extends Controller
{
    /**
     * Lists all interventionSheet entities.
     *
     * @Route("/", name="interventionsheet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $interventionSheets = $em->getRepository('AppBundle:InterventionSheet')->findAll();

        return $this->render('interventionsheet/index.html.twig', array(
            'interventionSheets' => $interventionSheets,
        ));
    }

    /**
     * Creates a new interventionSheet entity.
     *
     * @Route("/new", name="interventionsheet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $interventionSheet = new Interventionsheet();
        $form = $this->createForm('AppBundle\Form\InterventionSheetType', $interventionSheet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($interventionSheet);
            $em->flush();

            return $this->redirectToRoute('interventionsheet_show', array('id' => $interventionSheet->getId()));
        }

        return $this->render('interventionsheet/new.html.twig', array(
            'interventionSheet' => $interventionSheet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a interventionSheet entity.
     *
     * @Route("/{id}", name="interventionsheet_show")
     * @Method("GET")
     */
    public function showAction(InterventionSheet $interventionSheet)
    {
        $deleteForm = $this->createDeleteForm($interventionSheet);

        return $this->render('interventionsheet/show.html.twig', array(
            'interventionSheet' => $interventionSheet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing interventionSheet entity.
     *
     * @Route("/{id}/edit", name="interventionsheet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InterventionSheet $interventionSheet)
    {
        $deleteForm = $this->createDeleteForm($interventionSheet);
        $editForm = $this->createForm('AppBundle\Form\InterventionSheetType', $interventionSheet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interventionsheet_edit', array('id' => $interventionSheet->getId()));
        }

        return $this->render('interventionsheet/edit.html.twig', array(
            'interventionSheet' => $interventionSheet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a interventionSheet entity.
     *
     * @Route("/{id}", name="interventionsheet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InterventionSheet $interventionSheet)
    {
        $form = $this->createDeleteForm($interventionSheet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($interventionSheet);
            $em->flush();
        }

        return $this->redirectToRoute('interventionsheet_index');
    }

    /**
     * Creates a form to delete a interventionSheet entity.
     *
     * @param InterventionSheet $interventionSheet The interventionSheet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InterventionSheet $interventionSheet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('interventionsheet_delete', array('id' => $interventionSheet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

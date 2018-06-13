<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Unit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Unit controller.
 *
 * @Route("unit")
 */
class UnitController extends Controller
{
    /**
     * Lists all unit entities.
     *
     * @Route("/", name="unit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $units = $em->getRepository('AppBundle:Unit')->findAll();

        return $this->render('unit/index.html.twig', array(
            'units' => $units,
        ));
    }

    /**
     * Creates a new unit entity.
     *
     * @Route("/new", name="unit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $unit = new Unit();
        $form = $this->createForm('AppBundle\Form\UnitType', $unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unit);
            $em->flush();

            return $this->redirectToRoute('unit_show', array('id' => $unit->getId()));
        }

        return $this->render('unit/new.html.twig', array(
            'unit' => $unit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a unit entity.
     *
     * @Route("/{id}", name="unit_show")
     * @Method("GET")
     */
    public function showAction(Unit $unit)
    {
        $deleteForm = $this->createDeleteForm($unit);

        return $this->render('unit/show.html.twig', array(
            'unit' => $unit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing unit entity.
     *
     * @Route("/{id}/edit", name="unit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Unit $unit)
    {
        $deleteForm = $this->createDeleteForm($unit);
        $editForm = $this->createForm('AppBundle\Form\UnitType', $unit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('unit_edit', array('id' => $unit->getId()));
        }

        return $this->render('unit/edit.html.twig', array(
            'unit' => $unit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a unit entity.
     *
     * @Route("/{id}", name="unit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Unit $unit)
    {
        $form = $this->createDeleteForm($unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($unit);
            $em->flush();
        }

        return $this->redirectToRoute('unit_index');
    }

    /**
     * Creates a form to delete a unit entity.
     *
     * @param Unit $unit The unit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Unit $unit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('unit_delete', array('id' => $unit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

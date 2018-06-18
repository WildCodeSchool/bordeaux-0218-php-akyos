<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Parking;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Parking controller.
 *
 * @Route("parking")
 */
class ParkingController extends Controller
{
    /**
     * Lists all parking entities.
     *
     * @Route("/", name="parking_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parkings = $em->getRepository('AppBundle:Parking')->findAll();

        return $this->render('parking/index.html.twig', array(
            'parkings' => $parkings,
        ));
    }

    /**
     * Creates a new parking entity.
     *
     * @Route("/new", name="parking_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $parking = new Parking();
        $form = $this->createForm('AppBundle\Form\ParkingType', $parking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parking);
            $em->flush();

            return $this->redirectToRoute('parking_show', array('id' => $parking->getId()));
        }

        return $this->render('parking/new.html.twig', array(
            'parking' => $parking,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a parking entity.
     *
     * @Route("/{id}", name="parking_show")
     * @Method("GET")
     */
    public function showAction(Parking $parking)
    {
        $deleteForm = $this->createDeleteForm($parking);

        return $this->render('parking/show.html.twig', array(
            'parking' => $parking,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing parking entity.
     *
     * @Route("/{id}/edit", name="parking_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Parking $parking)
    {
        $deleteForm = $this->createDeleteForm($parking);
        $editForm = $this->createForm('AppBundle\Form\ParkingType', $parking);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parking_edit', array('id' => $parking->getId()));
        }

        return $this->render('parking/edit.html.twig', array(
            'parking' => $parking,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a parking entity.
     *
     * @Route("/{id}", name="parking_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Parking $parking)
    {
        $form = $this->createDeleteForm($parking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parking);
            $em->flush();
        }

        return $this->redirectToRoute('parking_index');
    }

    /**
     * Creates a form to delete a parking entity.
     *
     * @param Parking $parking The parking entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parking $parking)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parking_delete', array('id' => $parking->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

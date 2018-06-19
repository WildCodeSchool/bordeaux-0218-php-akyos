<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Building;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Building controller.
 *
 * @Route("building")
 */
class BuildingController extends Controller
{
    /**
     * Lists all building entities.
     *
     * @Route("/", name="building_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $buildings = $em->getRepository('AppBundle:Building')->findAll();

        return $this->render('building/index.html.twig', array(
            'buildings' => $buildings,
        ));
    }

    /**
     * Creates a new building entity.
     *
     * @Route("/new", name="building_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $building = new Building();
        $form = $this->createForm('AppBundle\Form\BuildingType', $building);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($building);
            $em->flush();

            return $this->redirectToRoute('building_show', array('id' => $building->getId()));
        }

        return $this->render('building/new.html.twig', array(
            'building' => $building,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a building entity.
     *
     * @Route("/{id}", name="building_show")
     * @Method("GET")
     */
    public function showAction(Building $building)
    {
        $deleteForm = $this->createDeleteForm($building);

        return $this->render('building/show.html.twig', array(
            'building' => $building,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing building entity.
     *
     * @Route("/{id}/edit", name="building_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Building $building)
    {
        $deleteForm = $this->createDeleteForm($building);
        $editForm = $this->createForm('AppBundle\Form\BuildingType', $building);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('building_edit', array('id' => $building->getId()));
        }

        return $this->render('building/edit.html.twig', array(
            'building' => $building,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a building entity.
     *
     * @Route("/{id}", name="building_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Building $building)
    {
        $form = $this->createDeleteForm($building);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($building);
            $em->flush();
        }

        return $this->redirectToRoute('building_index');
    }

    /**
     * Creates a form to delete a building entity.
     *
     * @param Building $building The building entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Building $building)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('building_delete', array('id' => $building->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

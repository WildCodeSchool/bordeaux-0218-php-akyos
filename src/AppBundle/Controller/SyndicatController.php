<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Syndicat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Syndicat controller.
 *
 * @Route("syndicat")
 */
class SyndicatController extends Controller
{
    /**
     * Lists all syndicat entities.
     *
     * @Route("/", name="syndicat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $syndicats = $em->getRepository('AppBundle:Syndicat')->findAll();

        return $this->render('syndicat/index.html.twig', array(
            'syndicats' => $syndicats,
        ));
    }

    /**
     * Creates a new syndicat entity.
     *
     * @Route("/new", name="syndicat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $syndicat = new Syndicat();
        $form = $this->createForm('AppBundle\Form\SyndicatType', $syndicat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($syndicat);
            $em->flush();

            return $this->redirectToRoute('syndicat_show', array('id' => $syndicat->getId()));
        }

        return $this->render('syndicat/new.html.twig', array(
            'syndicat' => $syndicat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a syndicat entity.
     *
     * @Route("/{id}", name="syndicat_show")
     * @Method("GET")
     */
    public function showAction(Syndicat $syndicat)
    {
        $deleteForm = $this->createDeleteForm($syndicat);

        return $this->render('syndicat/show.html.twig', array(
            'syndicat' => $syndicat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing syndicat entity.
     *
     * @Route("/{id}/edit", name="syndicat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Syndicat $syndicat)
    {
        $deleteForm = $this->createDeleteForm($syndicat);
        $editForm = $this->createForm('AppBundle\Form\SyndicatType', $syndicat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('syndicat_edit', array('id' => $syndicat->getId()));
        }

        return $this->render('syndicat/edit.html.twig', array(
            'syndicat' => $syndicat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a syndicat entity.
     *
     * @Route("/{id}", name="syndicat_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Syndicat $syndicat)
    {
        $form = $this->createDeleteForm($syndicat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($syndicat);
            $em->flush();
        }

        return $this->redirectToRoute('syndicat_index');
    }

    /**
     * Creates a form to delete a syndicat entity.
     *
     * @param Syndicat $syndicat The syndicat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Syndicat $syndicat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('syndicat_delete', array('id' => $syndicat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

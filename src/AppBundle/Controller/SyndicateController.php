<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Syndicate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Syndicate controller.
 *
 * @Route("syndicate")
 */
class SyndicateController extends Controller
{
    /**
     * Lists all syndicate entities.
     *
     * @Route("/", name="syndicate_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $syndicates = $em->getRepository('AppBundle:Syndicate')->findAll();

        return $this->render('syndicate/index.html.twig', array(
            'syndicates' => $syndicates,
        ));
    }

    /**
     * Creates a new syndicate entity.
     *
     * @Route("/new", name="syndicate_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $syndicate = new Syndicate();
        $form = $this->createForm('AppBundle\Form\SyndicateType', $syndicate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($syndicate);
            $em->flush();

            return $this->redirectToRoute('syndicate_show', array('id' => $syndicate->getId()));
        }

        return $this->render('syndicate/new.html.twig', array(
            'syndicate' => $syndicate,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a syndicate entity.
     *
     * @Route("/{id}", name="syndicate_show")
     * @Method("GET")
     */
    public function showAction(Syndicate $syndicate)
    {
        $deleteForm = $this->createDeleteForm($syndicate);

        return $this->render('syndicate/show.html.twig', array(
            'syndicate' => $syndicate,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing syndicate entity.
     *
     * @Route("/{id}/edit", name="syndicate_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Syndicate $syndicate)
    {
        $deleteForm = $this->createDeleteForm($syndicate);
        $editForm = $this->createForm('AppBundle\Form\SyndicateType', $syndicate);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('syndicate_edit', array('id' => $syndicate->getId()));
        }

        return $this->render('syndicate/edit.html.twig', array(
            'syndicate' => $syndicate,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a syndicate entity.
     *
     * @Route("/{id}", name="syndicate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Syndicate $syndicate)
    {
        $form = $this->createDeleteForm($syndicate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($syndicate);
            $em->flush();
        }

        return $this->redirectToRoute('syndicate_index');
    }

    /**
     * Creates a form to delete a syndicate entity.
     *
     * @param Syndicate $syndicate The syndicate entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Syndicate $syndicate)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('syndicate_delete', array('id' => $syndicate->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Common;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Common controller.
 *
 * @Route("common")
 */
class CommonController extends Controller
{
    /**
     * Lists all common entities.
     *
     * @Route("/", name="common_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commons = $em->getRepository('AppBundle:Common')->findAll();

        return $this->render('common/index.html.twig', array(
            'commons' => $commons,
        ));
    }

    /**
     * Creates a new common entity.
     *
     * @Route("/new", name="common_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $common = new Common();
        $form = $this->createForm('AppBundle\Form\CommonType', $common);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($common);
            $em->flush();

            return $this->redirectToRoute('common_show', array('id' => $common->getId()));
        }

        return $this->render('common/new.html.twig', array(
            'common' => $common,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a common entity.
     *
     * @Route("/{id}", name="common_show")
     * @Method("GET")
     */
    public function showAction(Common $common)
    {
        $deleteForm = $this->createDeleteForm($common);

        return $this->render('common/show.html.twig', array(
            'common' => $common,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing common entity.
     *
     * @Route("/{id}/edit", name="common_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Common $common)
    {
        $deleteForm = $this->createDeleteForm($common);
        $editForm = $this->createForm('AppBundle\Form\CommonType', $common);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('common_edit', array('id' => $common->getId()));
        }

        return $this->render('common/edit.html.twig', array(
            'common' => $common,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a common entity.
     *
     * @Route("/{id}", name="common_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Common $common)
    {
        $form = $this->createDeleteForm($common);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($common);
            $em->flush();
        }

        return $this->redirectToRoute('common_index');
    }

    /**
     * Creates a form to delete a common entity.
     *
     * @param Common $common The common entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Common $common)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('common_delete', array('id' => $common->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

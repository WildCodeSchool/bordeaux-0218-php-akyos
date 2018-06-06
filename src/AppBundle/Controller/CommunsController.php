<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Communs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Commun controller.
 *
 * @Route("communs")
 */
class CommunsController extends Controller
{
    /**
     * Lists all commun entities.
     *
     * @Route("/", name="communs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communs = $em->getRepository('AppBundle:Communs')->findAll();

        return $this->render('communs/index.html.twig', array(
            'communs' => $communs,
        ));
    }

    /**
     * Creates a new commun entity.
     *
     * @Route("/new", name="communs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commun = new Commun();
        $form = $this->createForm('AppBundle\Form\CommunsType', $commun);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commun);
            $em->flush();

            return $this->redirectToRoute('communs_show', array('id' => $commun->getId()));
        }

        return $this->render('communs/new.html.twig', array(
            'commun' => $commun,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commun entity.
     *
     * @Route("/{id}", name="communs_show")
     * @Method("GET")
     */
    public function showAction(Communs $commun)
    {
        $deleteForm = $this->createDeleteForm($commun);

        return $this->render('communs/show.html.twig', array(
            'commun' => $commun,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commun entity.
     *
     * @Route("/{id}/edit", name="communs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Communs $commun)
    {
        $deleteForm = $this->createDeleteForm($commun);
        $editForm = $this->createForm('AppBundle\Form\CommunsType', $commun);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communs_edit', array('id' => $commun->getId()));
        }

        return $this->render('communs/edit.html.twig', array(
            'commun' => $commun,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commun entity.
     *
     * @Route("/{id}", name="communs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Communs $commun)
    {
        $form = $this->createDeleteForm($commun);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commun);
            $em->flush();
        }

        return $this->redirectToRoute('communs_index');
    }

    /**
     * Creates a form to delete a commun entity.
     *
     * @param Communs $commun The commun entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Communs $commun)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('communs_delete', array('id' => $commun->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

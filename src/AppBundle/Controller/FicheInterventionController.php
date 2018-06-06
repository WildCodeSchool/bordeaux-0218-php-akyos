<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FicheIntervention;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ficheintervention controller.
 *
 * @Route("ficheintervention")
 */
class FicheInterventionController extends Controller
{
    /**
     * Lists all ficheIntervention entities.
     *
     * @Route("/", name="ficheintervention_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ficheInterventions = $em->getRepository('AppBundle:FicheIntervention')->findAll();

        return $this->render('ficheintervention/index.html.twig', array(
            'ficheInterventions' => $ficheInterventions,
        ));
    }

    /**
     * Creates a new ficheIntervention entity.
     *
     * @Route("/new", name="ficheintervention_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ficheIntervention = new Ficheintervention();
        $form = $this->createForm('AppBundle\Form\FicheInterventionType', $ficheIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficheIntervention);
            $em->flush();

            return $this->redirectToRoute('ficheintervention_show', array('id' => $ficheIntervention->getId()));
        }

        return $this->render('ficheintervention/new.html.twig', array(
            'ficheIntervention' => $ficheIntervention,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ficheIntervention entity.
     *
     * @Route("/{id}", name="ficheintervention_show")
     * @Method("GET")
     */
    public function showAction(FicheIntervention $ficheIntervention)
    {
        $deleteForm = $this->createDeleteForm($ficheIntervention);

        return $this->render('ficheintervention/show.html.twig', array(
            'ficheIntervention' => $ficheIntervention,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ficheIntervention entity.
     *
     * @Route("/{id}/edit", name="ficheintervention_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FicheIntervention $ficheIntervention)
    {
        $deleteForm = $this->createDeleteForm($ficheIntervention);
        $editForm = $this->createForm('AppBundle\Form\FicheInterventionType', $ficheIntervention);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ficheintervention_edit', array('id' => $ficheIntervention->getId()));
        }

        return $this->render('ficheintervention/edit.html.twig', array(
            'ficheIntervention' => $ficheIntervention,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ficheIntervention entity.
     *
     * @Route("/{id}", name="ficheintervention_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FicheIntervention $ficheIntervention)
    {
        $form = $this->createDeleteForm($ficheIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ficheIntervention);
            $em->flush();
        }

        return $this->redirectToRoute('ficheintervention_index');
    }

    /**
     * Creates a form to delete a ficheIntervention entity.
     *
     * @param FicheIntervention $ficheIntervention The ficheIntervention entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FicheIntervention $ficheIntervention)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ficheintervention_delete', array('id' => $ficheIntervention->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

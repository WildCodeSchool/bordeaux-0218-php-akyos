<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Intervenant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Intervenant controller.
 *
 * @Route("intervenant")
 */
class IntervenantController extends Controller
{
    /**
     * Lists all intervenant entities.
     *
     * @Route("/", name="intervenant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $intervenants = $em->getRepository('AppBundle:Intervenant')->findAll();

        return $this->render('intervenant/index.html.twig', array(
            'intervenants' => $intervenants,
        ));
    }

    /**
     * Creates a new intervenant entity.
     *
     * @Route("/new", name="intervenant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $intervenant = new Intervenant();
        $form = $this->createForm('AppBundle\Form\IntervenantType', $intervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervenant);
            $em->flush();

            return $this->redirectToRoute('intervenant_show', array('id' => $intervenant->getId()));
        }

        return $this->render('intervenant/new.html.twig', array(
            'intervenant' => $intervenant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a intervenant entity.
     *
     * @Route("/{id}", name="intervenant_show")
     * @Method("GET")
     */
    public function showAction(Intervenant $intervenant)
    {
        $deleteForm = $this->createDeleteForm($intervenant);

        return $this->render('intervenant/show.html.twig', array(
            'intervenant' => $intervenant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing intervenant entity.
     *
     * @Route("/{id}/edit", name="intervenant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Intervenant $intervenant)
    {
        $deleteForm = $this->createDeleteForm($intervenant);
        $editForm = $this->createForm('AppBundle\Form\IntervenantType', $intervenant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intervenant_edit', array('id' => $intervenant->getId()));
        }

        return $this->render('intervenant/edit.html.twig', array(
            'intervenant' => $intervenant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a intervenant entity.
     *
     * @Route("/{id}", name="intervenant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Intervenant $intervenant)
    {
        $form = $this->createDeleteForm($intervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($intervenant);
            $em->flush();
        }

        return $this->redirectToRoute('intervenant_index');
    }

    /**
     * Creates a form to delete a intervenant entity.
     *
     * @param Intervenant $intervenant The intervenant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Intervenant $intervenant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('intervenant_delete', array('id' => $intervenant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

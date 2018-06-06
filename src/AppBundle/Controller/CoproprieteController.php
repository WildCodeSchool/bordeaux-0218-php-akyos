<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Copropriete;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Copropriete controller.
 *
 * @Route("copropriete")
 */
class CoproprieteController extends Controller
{
    /**
     * Lists all copropriete entities.
     *
     * @Route("/", name="copropriete_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $coproprietes = $em->getRepository('AppBundle:Copropriete')->findAll();

        return $this->render('copropriete/index.html.twig', array(
            'coproprietes' => $coproprietes,
        ));
    }

    /**
     * Creates a new copropriete entity.
     *
     * @Route("/new", name="copropriete_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $copropriete = new Copropriete();
        $form = $this->createForm('AppBundle\Form\CoproprieteType', $copropriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($copropriete);
            $em->flush();

            return $this->redirectToRoute('copropriete_show', array('id' => $copropriete->getId()));
        }

        return $this->render('copropriete/new.html.twig', array(
            'copropriete' => $copropriete,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a copropriete entity.
     *
     * @Route("/{id}", name="copropriete_show")
     * @Method("GET")
     */
    public function showAction(Copropriete $copropriete)
    {
        $deleteForm = $this->createDeleteForm($copropriete);

        return $this->render('copropriete/show.html.twig', array(
            'copropriete' => $copropriete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing copropriete entity.
     *
     * @Route("/{id}/edit", name="copropriete_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Copropriete $copropriete)
    {
        $deleteForm = $this->createDeleteForm($copropriete);
        $editForm = $this->createForm('AppBundle\Form\CoproprieteType', $copropriete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('copropriete_edit', array('id' => $copropriete->getId()));
        }

        return $this->render('copropriete/edit.html.twig', array(
            'copropriete' => $copropriete,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a copropriete entity.
     *
     * @Route("/{id}", name="copropriete_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Copropriete $copropriete)
    {
        $form = $this->createDeleteForm($copropriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($copropriete);
            $em->flush();
        }

        return $this->redirectToRoute('copropriete_index');
    }

    /**
     * Creates a form to delete a copropriete entity.
     *
     * @param Copropriete $copropriete The copropriete entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Copropriete $copropriete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('copropriete_delete', array('id' => $copropriete->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

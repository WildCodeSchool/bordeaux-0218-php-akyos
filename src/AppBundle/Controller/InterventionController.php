<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Intervention;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Intervention controller.
 *
 * @Route("intervention")
 */
class InterventionController extends Controller
{

    /**
     * Lists today intervention entities.
     *
     * @Route("/{progress}", name="intervention_index",
     *                       requirements={"progress" = "en-cours|a-venir|realisees|a-planifier"})
     * @Method("GET")
     */
    public function indexAction(string $progress)
    {
        $em = $this->getDoctrine()->getManager();
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $interventions = $em->getRepository('AppBundle:Intervention')
                ->findBy([ 'progress' => $progress]);
        } else {
            $interventions = $this->getDoctrine()->getRepository(Intervention::class)
                ->findBySyndicateProgress(
                    $this->getUser()->getSyndicate(),
                    $progress
                );
        }

        return $this->render('intervention/index.html.twig', array(
            'interventions' => $interventions,
            'progress' => $progress,
        ));
    }


    /**
     * Creates a new intervention entity.
     *
     * @Route("/new", name="intervention_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $intervention = new Intervention();


        $form = $this->getInterventionForm($intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervention);
            $em->flush();


            $this->addFlash('success', 'intervention.created');

            return $this->redirectToRoute('intervention_show', array( 'id' => $intervention->getId() ));
        }

        return $this->render('intervention/new.html.twig', array(
            'intervention' => $intervention,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a intervention entity.
     *
     * @Route("/{id}", name="intervention_show")
     * @Method("GET")
     */
    public function showAction(Intervention $intervention)
    {
        $deleteForm = $this->createDeleteForm($intervention);

        return $this->render('intervention/show.html.twig', array(
            'intervention' => $intervention,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing intervention entity.
     *
     * @Route("/{id}/edit", name="intervention_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Intervention $intervention)
    {

        if ($intervention->getProgress() === 'realisees') {
            $this->redirectToRoute('intervention_show', null, 401);
        }
        $deleteForm = $this->createDeleteForm($intervention);
        $editForm = $this->getInterventionForm($intervention);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intervention_show', array( 'id' => $intervention->getId() ));
        }

        return $this->render('intervention/edit.html.twig', array(
            'intervention' => $intervention,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a intervention entity.
     *
     * @Route("/{id}", name="intervention_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Intervention $intervention)
    {
        $form = $this->createDeleteForm($intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($intervention);
            $em->flush();
        }

        return $this->redirectToRoute('intervention_index');
    }

    /**
     * Creates a form to delete a intervention entity.
     *
     * @param Intervention $intervention The intervention entity
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(Intervention $intervention)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl(
                'intervention_delete',
                array( 'id' => $intervention->getId() )
            ))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Creates form determined by ROLE_USER.
     *
     */
    public function getInterventionForm($intervention)
    {
        $user_roles = $this->getUser()->getRoles();

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->createForm('AppBundle\Form\InterventionDmsType', $intervention, array('role' => $user_roles));
        }
        return $this->createForm('AppBundle\Form\InterventionType', $intervention, array(
            'role' => $user_roles,
            'syndicateId' => $this->getUser()->getSyndicate()->getId()));
    }
}

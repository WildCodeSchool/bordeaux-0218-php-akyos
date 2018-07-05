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
     * @Route("/en-cours", name="intervention_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $interventions = $em->getRepository('AppBundle:Intervention')
            ->findBy([ 'interventionDate' => new \DateTime(date('Y-m-d')) ]);


        return $this->render('intervention/index.html.twig', array(
            'interventions' => $interventions,
        ));
    }
    /**
     * Lists all intervention entities.
     *
     * @Route("/archivees", name="intervention_history")
     * @Method("GET")
     */
    public function historyAction()
    {
        $em = $this->getDoctrine()->getManager();

        $interventions = $em->getRepository('AppBundle:Intervention')->findBy([ 'interventionDate' => new \DateTime(date('Y-m-d')) ]);

        return $this->render('intervention/index.html.twig', array(
            'interventions' => $interventions,
        ));
    }

    /**
     * Lists all intervention entities.
     *
     * @Route("/a-venir", name="intervention_planned")
     * @Method("GET")
     */
    public function plannedAction()
    {
        $em = $this->getDoctrine()->getManager();

        $interventions = $em->getRepository('AppBundle:Intervention')->findAll();

        return $this->render('intervention/index.html.twig', array(
            'interventions' => $interventions,
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

            return $this->redirectToRoute(
                'intervention_show',
                array( 'id' => $intervention->getId() )
            );
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
        $deleteForm = $this->createDeleteForm($intervention);
        $editForm = $this->getInterventionForm($intervention);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intervention_edit', array( 'id' => $intervention->getId() ));
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

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->createForm('AppBundle\Form\InterventionDmsType', $intervention);
        }
        return $this->createForm('AppBundle\Form\InterventionType', $intervention, array('syndicateId' => $this->getUser()->getSyndicate()->getId()));
    }
}

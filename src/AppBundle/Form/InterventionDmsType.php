<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Repository\WorkerRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class InterventionDmsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('progress', ChoiceType::class, array(
                'placeholder' => 'Progression de l\'intervention',
                'choices' => array(
                    'À planifier' => 'a-planifier',
                    'En cours' => 'en-cours',
                    'Terminé' => 'realisees',
                    'Planifié' => 'a-venir',
                ),
                'label' => 'etat'
            ))
            ->add('material')
            ->add('worker')

            ->add('workerNumber')
            ->add('duration')
            ->add('interventionDate')
            ->add('paid')
            ->add('clientSatisfaction', RangeType::class, array(
                'attr' => array(
                    'min' => 1,
                    'max' => 5
                )
            ))
            ->add('condominium', EntityType::class, array(
                'placeholder' => 'Choose a Sub Family',
                'class' => 'AppBundle:Condominium'))
        ;

        $builder->get('condominium')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $form->getParent()->add('building', EntityType::class, array(
                    'class' => 'AppBundle\Entity\Building',
                    'placeholder' => 'Sélectionnez un bâtiment',
                    'mapped' => false,
                    'required' => false,
                    'choices' => $form->getData()->getBuildings()
                ));
            }
        );
    }

    public function getParent()
    {
        return 'AppBundle\Form\InterventionType';
    }

    public function getBlockPrefix()
    {
        return 'appbundle_interventiondms';
    }
}

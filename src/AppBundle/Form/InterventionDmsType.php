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

class InterventionDmsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('progress', ChoiceType::class, array(
                'choices' => array(
                    'Progression de l\'intervention' => 'Choose an option',
                    'À planifier' => 'À planifier',
                    'En cours' => 'En cours',
                    'Terminé' => 'Terminé',
                    'À replanifier' => 'À replanifier',
                ),
                'label' => 'etat'
            ))
            ->add('material')




            ->add('worker')



            ->add('workerNumber')
            ->add('duration', TimeType::class, array(
                'placeholder' => array(
                    'hour' => 'Heure', 'minute' => 'Minute',
                )
            ))
            ->add('interventionDate')


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
                    'placeholder' => 'Sélectionnez un batiment',
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

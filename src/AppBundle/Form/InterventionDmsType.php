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

class InterventionDmsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('progress', ChoiceType::class, array(
                'choices' => array(
                    'placeholder' => 'Choose an option',
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
            ->add('interventionDate');

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
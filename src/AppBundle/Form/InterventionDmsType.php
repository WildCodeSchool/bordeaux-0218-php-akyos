<?php

namespace AppBundle\Form;

use AppBundle\Entity\Intervention;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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

        $intervention = $options['data'];

        $builder
            ->add('interventionDate', DateType::class,[
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'class' => 'js-datepicker form-control',
                    'data-date-format'=>"dd/mm/yy"
                    ]
                ])
            ->add('paid')
            ->add('progress', ChoiceType::class, array(
                'placeholder' => 'Progression de l\'intervention',
                'choices' => array(
                    'À planifier' => 'à planifier',
                    'En cours' => 'en cours',
                    'Terminé' => 'realisées',
                    'Planifié' => 'à venir',
                ),
                'label' => 'état'
            ))
            ->add('material')
            ->add('worker')
            ->add('workerNumber')
            ->add('duration');

        if ($intervention->getProgress() === $intervention::DONE) {
            $builder
                ->add('clientSatisfaction', RangeType::class, array(
                    'attr' => array(
                        'min' => 1,
                        'max' => 5
                    )
                ));
        }
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

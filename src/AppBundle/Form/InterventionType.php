<?php

namespace AppBundle\Form;

use phpDocumentor\Reflection\Types\Compound;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class InterventionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
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
            ->add('interventionType', ChoiceType::class, array(
                'choices'  => array(
                    'placeholder' => 'Choose an option',
                    'Électricité' => 'Électricité',
                    'Plomberie' => 'Plomberie',
                    'Serrurerie' => 'Serrurerie',
                    'Autre' => 'Autre',
                ),
            ))
            ->add('material')
            ->add('emergency', ChoiceType::class, array(
                'choices'=>array(
                'Prioritaire'=>'Prioritaire',
                'Modéré'=>'Modéré',
                'Basse'=>'Basse',
                ),
            ))
            ->add('description')
            ->add('interventionDate')
            ->add('paid')
            ->add('clientSatisfaction', RangeType::class, array(
                'attr' => array(
                    'min' => 1,
                    'max' => 5
                )
            ))
            ->add('comment')
            ->add('workerNumber')
            ->add('duration', TimeType::class, array(
                'placeholder' => array(
                'hour' => 'Heure', 'minute' => 'Minute',
                )
            ))
            ->add('worker')
            ->add('condominium');
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Intervention'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_intervention';
    }
}

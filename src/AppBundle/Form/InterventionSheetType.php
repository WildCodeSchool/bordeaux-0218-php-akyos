<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterventionSheetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('progress')
            ->add('interventionType')
            ->add('material')
            ->add('emergency')
            ->add('description')
            ->add('requestDate')
            ->add('interventionDate')
            ->add('modificationDate')
            ->add('paid')
            ->add('clientSatisfaction')
            ->add('comment')
            ->add('workerNumber')
            ->add('duration')
            ->add('worker')
            ->add('condominium');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\InterventionSheet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_interventionsheet';
    }
}

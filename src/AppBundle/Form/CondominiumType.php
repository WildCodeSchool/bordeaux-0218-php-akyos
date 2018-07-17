<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\CommonType;

class CondominiumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address', TextareaType::class)
            ->add('buildings', CollectionType::class, array(
            // each entry in the array will be an "building" field
            'entry_type' => BuildingType::class,

                'prototype' => true,
               // 'prototype_data' => 'New Tag Placeholder',
                'allow_add' => true,            // these options are passed to each "building" type
                'entry_options' => array(
                  'attr' => array('class' => 'building-box'),
                 ),
            ))
            ->add('commons', CollectionType::class, array(
                // each entry in the array will be an "parking" field
                'entry_type' => CommonType::class,

                'prototype' => true,
                // 'prototype_data' => 'New Tag Placeholder',
                'allow_add' => true,            // these options are passed to each "building" type
                'entry_options' => array(
                    'attr' => array('class' => 'common-box'),
                ),
            ))
            ->add('parkings', CollectionType::class, array(
                // each entry in the array will be an "parking" field
                'entry_type' => ParkingType::class,

                'prototype' => true,
                // 'prototype_data' => 'New Tag Placeholder',
                'allow_add' => true,            // these options are passed to each "building" type
                'entry_options' => array(
                    'attr' => array('class' => 'parking-box'),
                ),
            ))

            ->add('condominiumManager')
            ->add('phone')
            ->add('email', EmailType::class)
            ->add('publicMessage', TextareaType::class)
            ->add('privateMessage', TextareaType::class)
            ;
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Condominium'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_condominium';
    }
}

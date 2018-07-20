<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



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
                 //each entry in the array will be an "building" field
                'entry_type' => BuildingType::class,
                'by_reference' => false,
                'required' => false,
                'label' => false,
                'empty_data' => null,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'mapped' => true

            ))
            ->add('commons',       CollectionType::class, array(
                //each entry in the array will be an "parking" field
                'entry_type' => CommonMiniType::class,
                'by_reference' => false,
                'required' => false,
                'label' => false,
                'empty_data' => null,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'mapped' => true
            ))
            ->add('parkings', CollectionType::class, array(
                 //each entry in the array will be an "parking" field
                'entry_type' => ParkingMiniType::class,
                'by_reference' => false,
                'required' => false,
                'label' => false,
                'empty_data' => null,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'mapped' => true
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

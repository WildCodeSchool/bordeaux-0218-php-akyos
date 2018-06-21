<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SyndicateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
<<<<<<< Updated upstream:src/AppBundle/Form/SyndicateType.php
        $builder
            ->add('name')
            ->add('adress')
            ->add('phone')
            ->add('email')
            ->add('condominiumManager');
=======
        $builder->add('nom')
                ->add('adresse')
                ->add('telephone')
                ->add('email')
                ->add('chargeCopro')
                ->add('user');
>>>>>>> Stashed changes:src/AppBundle/Form/SyndicatType.php
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Syndicate'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_syndicate';
    }
}

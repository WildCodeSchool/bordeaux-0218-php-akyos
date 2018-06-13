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
        $builder->add('avancement')->add('typeIntervention')->add('fourniture')->add('urgence')->add('descriptif')->add('dateDemande')->add('dateIntervention')->add('dateModification')->add('paid')->add('satisfactionClient')->add('commentaire')->add('nombreIntervenants')->add('duree')->add('worker')->add('condominium');
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

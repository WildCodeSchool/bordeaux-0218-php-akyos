<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterventionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('progress')
            ->add('interventionType', ChoiceType::class, [
                'choices'  => [
                    'Scheduled' => null,
                    'Done' => true,
                    'Re-schedule' => false,
                ]])
            ->add('material')
            ->add('emergency', ChoiceType::class, [
                'choices' => [
                    'Low' => null,
                    'Medium' => true,
                    'High' => false,
                ]])
            ->add('description')
            ->add('requestDate')
            ->add('interventionDate')
            ->add('modificationDate')
            ->add('paid')
            ->add('clientSatisfaction')
            ->add('comment')
            ->add('workerNumber')
            ->add('duration')
            ->add('worker', EntityType::class, array())
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

<?php

namespace AppBundle\Form;

use phpDocumentor\Reflection\Types\Compound;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use AppBundle\Repository\CondominiumRepository;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Building;
use AppBundle\Entity\Condominium;
use Symfony\Component\Form\FormEvent;


use Symfony\Component\Security\Core\SecurityContext;

class InterventionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('condominium', EntityType::class, array(
                'class' => 'AppBundle:Condominium',
                'placeholder' => 'Sélectionnez une copropriété',
                'query_builder' => function (CondominiumRepository $er) use ($options) {
                    return $er->condoBySyndicQueryBuilder($options['syndicateId']);
                }
            ));



        $builder->get('condominium')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                dump($event->getForm());
                dump($event->getForm()->getData());
                dump($event->getForm()->getData()->getBuildings());

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

        $builder
            ->add('interventionType', ChoiceType::class, [

                'placeholder' => 'Sélectionnez un type d\'intervention',
                'choices'  => [
                    'Électricité' => '',
                    'Plomberie' => '',
                    'Serrurerie' => '',
                    'Autre' => '',
                ]])

            ->add('emergency', ChoiceType::class, [
                'placeholder' => 'Sélectionnez l\'urgence de l\'intervention',
                'choices' => [
                    'Basse' => 'Low',
                    'Moyen' => 'Medium',
                    'Urgent' => 'High',
                ]])
            ->add('description')

            ->add('paid')
            ->add('clientSatisfaction', RangeType::class, array(
                'attr' => array(
                    'min' => 1,
                    'max' => 5
                )
            ))

            ->add('comment');



    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Intervention',
            'syndicateId' => null,
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
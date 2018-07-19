<?php

namespace AppBundle\Form;

use AppBundle\Entity\Building;
use AppBundle\Entity\Condominium;
use Doctrine\ORM\EntityRepository;
use phpDocumentor\Reflection\Types\Compound;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use AppBundle\Repository\CondominiumRepository;
use AppBundle\Repository\UnitRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class InterventionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (!in_array('ROLE_ADMIN', $options['role'])) {
            $builder
                ->add('condominium', EntityType::class, array(
                    'class' => 'AppBundle:Condominium',
                    'placeholder' => 'Sélectionnez une copropriété',
                    'query_builder' => function (CondominiumRepository $er) use ($options) {
                        return $er->condoBySyndicQueryBuilder($options['syndicateId']);
                    },
                    'attr' => [
                        'class' => 'dynamicField',
                        'data-next' => 'building'
                    ]
                ));

            $builder->get('condominium')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) {
                    $form = $event->getForm();
                    $this->addBuildingField($form->getParent(), $form->getData());
                }
            );
        }

            $builder
                ->add('interventionType', ChoiceType::class, [

                    'placeholder' => 'Sélectionnez un type d\'intervention',
                    'choices' => [
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
                ->add('comment');
    }


    private function addBuildingField(FormInterface $form, Condominium $condominium = null)
    {
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'building',
            EntityType::class,
            null,
            [
                'class' => 'AppBundle\Entity\Building',
                'placeholder' => 'Sélectionnez un batiment',
                'mapped' => false,
                'required' => false,
                'auto_initialize' => false,
                'choices' => $condominium ? $condominium->getBuildings() : [],
                'attr' =>[
                    'class' => 'dynamicField',
                    'data-next' => 'interventionPlaceType'
                ]
            ]
        );

        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $this->addInterventionPlaceType($form->getParent(), $form->getData());
            }
        );

        $form->add($builder->getForm());
    }

    private function addInterventionPlaceType(FormInterface $form, ?Building $building)
    {

        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'interventionPlaceType',
            ChoiceType::class,
            null,
            [
                'mapped' => false,
                'required' => false,
                'auto_initialize' => false,
                'label' => 'Lieu d\'intervention',
                'choices' => array(
                    'Partie commune' => 'Common',
                    'Lot' => 'Unit',
                    'Parking' => 'Parking',
                ),
                'attr' =>[
                    'class' => 'dynamicField',
                    'data-next' => 'Unit'
                ]
            ]
        );

        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($building) {
                $form = $event->getForm();
                $this->addInterventionPlaceField($form->getParent(), $form->getData(),  $building);
            }
        );

        $form->add($builder->getForm());
    }


    private function addInterventionPlaceField(FormInterface $form, $interventionPlaceType = '', ?Building $building)
    {

        $class = 'AppBundle:' . $interventionPlaceType;

        if (class_exists('AppBundle\Entity\\' . $interventionPlaceType)) {
            $buildingId = $building ? $building->getId() : null;
            $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                $interventionPlaceType,
                EntityType::class,
                null,
                [
                    'class' => $class,
                    'placeholder' => 'Sélectionnez un lieu d\'intervention',
                    'mapped' => true,
                    'required' => false,
                    'auto_initialize' => false,
                    'query_builder' => function (EntityRepository $er) use ($buildingId) {
                        return $er->createQueryBuilder('u')
                            ->where('u.building = :building_id')
                            ->setParameter('building_id', $buildingId)
                            ;
                    },
                    'attr' =>[
                        'class' => 'dynamicField',
                        'data-next' => null
                    ],
                ]
            );

            $form->add($builder->getForm());
        }
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Intervention',
            'syndicateId' => null,
            'role' => 'ROLE_USER',
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

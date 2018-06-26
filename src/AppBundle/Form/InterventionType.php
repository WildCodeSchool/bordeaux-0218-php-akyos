<?php

namespace AppBundle\Form;

use phpDocumentor\Reflection\Types\Compound;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use AppBundle\Repository\CondominiumRepository;

use Symfony\Component\Security\Core\SecurityContext;

class InterventionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('interventionType', ChoiceType::class, array(
                'choices' => array(
                    'placeholder' => 'Choose an option',
                    'Électricité' => 'Électricité',
                    'Plomberie' => 'Plomberie',
                    'Serrurerie' => 'Serrurerie',
                    'Autre' => 'Autre',
                ),
            ))
            ->add('emergency', ChoiceType::class, array(
                'choices'=>array(
                'Prioritaire'=>'Prioritaire',
                'Modéré'=>'Modéré',
                'Basse'=>'Basse',
                ),
            ))
            ->add('description')

            ->add('paid')
            ->add('clientSatisfaction', RangeType::class, array(
                'attr' => array(
                    'min' => 1,
                    'max' => 5
                )
            ))
            ->add('comment')



            ->add('condominium', EntityType::class, array(
                'placeholder' => 'Choose a Sub Family',
                'class' => 'AppBundle:Condominium',
                'query_builder' => function (CondominiumRepository $er) use ($options) {
                    return $er->condoBySyndicQueryBuilder($options['syndicateId']);
                }
                ));
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

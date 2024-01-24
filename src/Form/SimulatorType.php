<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SimulatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', ChoiceType::class, [
                'required'=>true,
                'label'  => "Type:",
                'attr'=>[
                    'class'=>'form-control',
                ],
                'choices'  => [
                    "EPR" => "EPR",
                    "DAT" => "DAT",
                ],
            ])
            ->add('datedepot' , TextType::class, [
                'required'=>true,
                'label'=>'Date depot  * :',
                'attr'=>[
                    'class'         => 'form-control flatpickr-basic',
                    'placeholder'   => 'YYYY-MM-DD'
                ]
            ])
            ->add('rate' , TextType::class, [
                'required'=>true,
                'label'=>'Taux en % * :',
                'attr'=>[
                    'class'=>'form-control',
                ]
            ])
            ->add('interests', ChoiceType::class, [
                'required'=>true,
                'label'  => "Type:",
                'attr'=>[
                    'class'=>'form-control',
                ],
                'choices'  => [
                    "Annuel" => "Annuel",
                    "Mensuel" => "Mensuel",
                ],
            ])
            ->add('amount', TextType::class, [
                'required'=>true,
                'label'=>'Montant du depot  * :',
                'attr'=>[
                    'class'=>'form-control',
                ]
            ])

            ->add('datefin' , TextType::class, [
                'required'=>true,
                'label'=>'Date Fin  * :',
                'attr'=>[
                    'class'         => 'form-control flatpickr-basic',
                    'placeholder'   => 'YYYY-MM-DD'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

<?php

namespace App\Demo\ColorPicker\Form\Type\Step;

use App\Demo\ColorPicker\Form\Data\ColorPickerDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Step1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mainColor', ChoiceType::class, [
                'label' => 'Main Color',
                'choices' => [
                    'Red' => '#FF0000',
                    'Green' => '#00FF00',
                    'Blue' => '#0000FF',
                    'Yellow' => '#FFFF00',
                    'Purple' => '#800080',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ColorPickerDto::class,
            'inherit_data' => true,
        ]);
    }
}

<?php

namespace App\Demo\Basic\Form\Type\Step;

use App\Demo\Basic\Form\Data\BasicDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Step2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('field21', ChoiceType::class, [
                'choices' => [
                    'Choice 1' => 'choice1',
                    'Choice 2' => 'choice2',
                    'Choice 3' => 'choice3',
                ],
                'placeholder' => '',
            ])
            ->add('field22', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BasicDto::class,
            'inherit_data' => true,
        ]);
    }
}

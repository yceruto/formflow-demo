<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\BookFlightDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BaggageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('baggageOption', ChoiceType::class, [
            'label' => 'Baggage Allowance',
            'choices' => [
                'Carry-on only (included)' => 'carry_on',
                '1 Checked bag (23kg) — $30' => '1_bag',
                '2 Checked bags (23kg each) — $55' => '2_bags',
            ],
            'expanded' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Baggage',
            'help' => 'Select your baggage allowance.',
            'data_class' => BookFlightDto::class,
            'inherit_data' => true,
        ]);
    }
}

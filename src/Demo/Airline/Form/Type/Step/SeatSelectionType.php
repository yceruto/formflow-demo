<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\BookFlightDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeatSelectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('seatPreference', ChoiceType::class, [
            'label' => 'Seat Preference',
            'choices' => [
                'Window' => 'window',
                'Middle' => 'middle',
                'Aisle' => 'aisle',
            ],
            'expanded' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Seat Selection',
            'help' => 'Choose your preferred seat location.',
            'data_class' => BookFlightDto::class,
            'inherit_data' => true,
        ]);
    }
}

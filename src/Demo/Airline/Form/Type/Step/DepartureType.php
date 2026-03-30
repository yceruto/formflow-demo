<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\BookFlightDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepartureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fromAirport', ChoiceType::class, [
                'label' => 'From',
                'placeholder' => 'Select departure airport',
                'choices' => [
                    'New York (JFK)' => 'JFK',
                    'Los Angeles (LAX)' => 'LAX',
                    'London (LHR)' => 'LHR',
                    'Paris (CDG)' => 'CDG',
                    'Tokyo (NRT)' => 'NRT',
                    'Madrid (MAD)' => 'MAD',
                    'Dubai (DXB)' => 'DXB',
                ],
            ])
            ->add('toAirport', ChoiceType::class, [
                'label' => 'To',
                'placeholder' => 'Select arrival airport',
                'choices' => [
                    'New York (JFK)' => 'JFK',
                    'Los Angeles (LAX)' => 'LAX',
                    'London (LHR)' => 'LHR',
                    'Paris (CDG)' => 'CDG',
                    'Tokyo (NRT)' => 'NRT',
                    'Madrid (MAD)' => 'MAD',
                    'Dubai (DXB)' => 'DXB',
                ],
            ])
            ->add('departureDate', DateType::class, [
                'label' => 'Departure Date',
                'widget' => 'single_text',
                'input' => 'string',
                'html5' => true,
            ])
            ->add('passengers', IntegerType::class, [
                'label' => 'Number of Passengers',
                'attr' => ['min' => 1, 'max' => 9],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Departure',
            'help' => 'Enter your departure details and number of passengers.',
            'data_class' => BookFlightDto::class,
            'inherit_data' => true,
        ]);
    }
}

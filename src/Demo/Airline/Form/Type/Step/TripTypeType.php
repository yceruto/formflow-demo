<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\BookFlightDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('tripType', ChoiceType::class, [
            'label' => 'How would you like to travel?',
            'choices' => [
                'Round Trip' => 'round_trip',
                'One Way' => 'one_way',
            ],
            'expanded' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Trip Type',
            'help' => 'Select your preferred trip type.',
            'data_class' => BookFlightDto::class,
            'inherit_data' => true,
        ]);
    }
}

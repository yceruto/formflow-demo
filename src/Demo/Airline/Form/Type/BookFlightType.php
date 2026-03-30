<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type;

use App\Demo\Airline\Form\Data\BookFlightDto;
use App\Demo\Airline\Form\Type\Step\BaggageType;
use App\Demo\Airline\Form\Type\Step\ConfirmationType;
use App\Demo\Airline\Form\Type\Step\ContactInfoType;
use App\Demo\Airline\Form\Type\Step\DepartureType;
use App\Demo\Airline\Form\Type\Step\PassengerDetailsType;
use App\Demo\Airline\Form\Type\Step\PaymentType;
use App\Demo\Airline\Form\Type\Step\ReturnFlightType;
use App\Demo\Airline\Form\Type\Step\SeatSelectionType;
use App\Demo\Airline\Form\Type\Step\TripTypeType;
use Symfony\Component\Form\Flow\AbstractFlowType;
use Symfony\Component\Form\Flow\FormFlowBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookFlightType extends AbstractFlowType
{
    public function buildFormFlow(FormFlowBuilderInterface $builder, array $options): void
    {
        // Group 1: Search
        $search = $builder->createStepGroup('search');
        $search->addStep('tripType', TripTypeType::class);
        $search->addStep('departure', DepartureType::class);
        $search->addStep('returnFlight', ReturnFlightType::class, skip: fn (BookFlightDto $data) => 'round_trip' !== $data->tripType);
        $builder->addStep($search);

        // Group 2: Passengers
        $passengers = $builder->createStepGroup('passengers');
        $passengers->addStep('passengerDetails', PassengerDetailsType::class);
        $passengers->addStep('contactInfo', ContactInfoType::class);
        $builder->addStep($passengers);

        // Group 3: Extras
        $extras = $builder->createStepGroup('extras');
        $extras->addStep('seatSelection', SeatSelectionType::class);
        $extras->addStep('baggage', BaggageType::class);
        $builder->addStep($extras);

        // Step 4: Payment (not grouped)
        $builder->addStep('payment', PaymentType::class);

        // Step 5: Confirmation (not grouped)
        $builder->addStep('confirmation', ConfirmationType::class);

        $builder->add('navigator', BookFlightNavigatorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BookFlightDto::class,
            'step_property_path' => 'currentStep',
        ]);
    }
}

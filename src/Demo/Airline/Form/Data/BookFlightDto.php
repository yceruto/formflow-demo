<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Data;

use App\Demo\Airline\Form\Data\Step\ContactInfoDto;
use App\Demo\Airline\Form\Data\Step\PassengerDto;
use Symfony\Component\Validator\Constraints as Assert;

class BookFlightDto
{
    // Search group steps:

    #[Assert\NotBlank(groups: ['tripType'])]
    public ?string $tripType = 'round_trip';

    #[Assert\NotBlank(groups: ['departure'])]
    public ?string $fromAirport = null;

    #[Assert\NotBlank(groups: ['departure'])]
    public ?string $toAirport = null;

    #[Assert\NotBlank(groups: ['departure'])]
    public ?string $departureDate = null;

    #[Assert\NotNull(groups: ['departure'])]
    #[Assert\Positive(groups: ['departure'])]
    public ?int $passengers = 1;

    #[Assert\NotBlank(groups: ['returnFlight'])]
    public ?string $returnDate = null;

    // Passengers group steps:

    #[Assert\Valid(groups: ['passengerDetails'])]
    public ?PassengerDto $passengerDetails = null;

    #[Assert\Valid(groups: ['contactInfo'])]
    public ?ContactInfoDto $contactInfo = null;

    // Extras group steps:

    #[Assert\NotBlank(groups: ['seatSelection'])]
    public ?string $seatPreference = null;

    #[Assert\NotBlank(groups: ['baggage'])]
    public ?string $baggageOption = null;

    // Payment step:

    #[Assert\NotBlank(groups: ['payment'])]
    public ?string $paymentMethod = null;

    // Confirmation step:

    #[Assert\IsTrue(groups: ['confirmation'])]
    public bool $agreeTerms = false;

    // Current step value:

    public string $currentStep = 'tripType';
}

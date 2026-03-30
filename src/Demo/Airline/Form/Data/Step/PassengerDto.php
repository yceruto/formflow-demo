<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Data\Step;

use Symfony\Component\Validator\Constraints as Assert;

class PassengerDto
{
    #[Assert\NotBlank(groups: ['passengerDetails'])]
    #[Assert\Length(min: 2, max: 100, groups: ['passengerDetails'])]
    public ?string $firstName = null;

    #[Assert\NotBlank(groups: ['passengerDetails'])]
    #[Assert\Length(min: 2, max: 100, groups: ['passengerDetails'])]
    public ?string $lastName = null;

    #[Assert\NotBlank(groups: ['passengerDetails'])]
    public ?string $dateOfBirth = null;

    #[Assert\NotBlank(groups: ['passengerDetails'])]
    public ?string $documentType = null;

    #[Assert\NotBlank(groups: ['passengerDetails'])]
    public ?string $documentNumber = null;
}

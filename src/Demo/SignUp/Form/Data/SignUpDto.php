<?php

namespace App\Demo\SignUp\Form\Data;

use App\Demo\SignUp\Form\Data\Step\CredentialsDto;
use App\Demo\SignUp\Form\Data\Step\IndividualDto;
use App\Demo\SignUp\Form\Data\Step\OrganizationDto;
use Symfony\Component\Validator\Constraints as Assert;

class SignUpDto
{
    // Step 1: Type selection
    #[Assert\NotBlank(groups: ['type'])]
    public ?string $type = null;

    // Step 2a: Individual information
    #[Assert\Valid(groups: ['individual'])]
    public ?IndividualDto $individual = null;

    // Step 2b: Organization information
    #[Assert\Valid(groups: ['organization'])]
    public ?OrganizationDto $organization = null;

    // Step 3: Account credentials
    #[Assert\Valid(groups: ['credentials'])]
    public ?CredentialsDto $credentials = null;

    // Step 4: Confirmation
    #[Assert\NotBlank(groups: ['confirmation'])]
    #[Assert\EqualTo(true, groups: ['confirmation'])]
    public bool $agreeTerms = false;

    // Current step value
    public string $currentStep = 'type';
}

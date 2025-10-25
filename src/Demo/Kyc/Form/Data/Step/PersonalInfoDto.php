<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Data\Step;

use Symfony\Component\Validator\Constraints as Assert;

class PersonalInfoDto
{
    #[Assert\NotBlank(groups: ['personalInfo'])]
    #[Assert\Length(min: 2, max: 100, groups: ['personalInfo'])]
    public ?string $firstName = null;

    #[Assert\NotBlank(groups: ['personalInfo'])]
    #[Assert\Length(min: 2, max: 100, groups: ['personalInfo'])]
    public ?string $lastName = null;

    #[Assert\NotBlank(groups: ['personalInfo'])]
    #[Assert\Date(groups: ['personalInfo'])]
    public ?string $dateOfBirth = null;

    #[Assert\NotBlank(groups: ['personalInfo'])]
    #[Assert\Regex(pattern: '/^\+?[1-9]\d{1,14}$/', message: 'Please enter a valid phone number', groups: ['personalInfo'])]
    public ?string $phone = null;

    #[Assert\NotBlank(groups: ['personalInfo'])]
    public ?string $country = null;
}

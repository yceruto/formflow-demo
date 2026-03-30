<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Data\Step;

use Symfony\Component\Validator\Constraints as Assert;

class ContactInfoDto
{
    #[Assert\NotBlank(groups: ['contactInfo'])]
    #[Assert\Email(groups: ['contactInfo'])]
    public ?string $email = null;

    #[Assert\NotBlank(groups: ['contactInfo'])]
    public ?string $phone = null;
}

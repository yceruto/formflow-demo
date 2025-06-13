<?php

namespace App\Demo\SignUp\Form\Data\Step;

use Symfony\Component\Validator\Constraints as Assert;

class CredentialsDto
{
    #[Assert\NotBlank(groups: ['credentials'])]
    #[Assert\Email(groups: ['credentials'])]
    public ?string $email = null;

    #[Assert\NotBlank(groups: ['credentials'])]
    #[Assert\Length(min: 6, groups: ['credentials'])]
    public ?string $password = null;
}

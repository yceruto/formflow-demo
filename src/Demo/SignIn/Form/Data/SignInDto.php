<?php

namespace App\Demo\SignIn\Form\Data;

use Symfony\Component\Validator\Constraints as Assert;

class SignInDto
{
    // Step 1:

    #[Assert\NotBlank(groups: ['email'])]
    #[Assert\Email(groups: ['email'])]
    #[Assert\EqualTo('flow@example.com', message: 'The email must be flow@example.com', groups: ['email'])]
    public ?string $email = null;


    // Step 2:

    #[Assert\NotBlank(groups: ['password'])]
    #[Assert\EqualTo('1234', message: 'The password must be 1234', groups: ['password'])]
    public ?string $password = null;


    // Current step value:

    public string $currentStep = 'email';
}

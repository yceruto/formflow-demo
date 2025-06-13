<?php

namespace App\Demo\SignUp\Form\Data\Step;

use Symfony\Component\Validator\Constraints as Assert;

class IndividualDto
{
    #[Assert\NotBlank(groups: ['individual'])]
    public ?string $firstName = null;

    #[Assert\NotBlank(groups: ['individual'])]
    public ?string $lastName = null;

    #[Assert\NotBlank(groups: ['individual'])]
    #[Assert\Length(min: 10, groups: ['individual'])]
    public ?string $about = null;
}

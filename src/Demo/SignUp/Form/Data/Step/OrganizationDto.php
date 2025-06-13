<?php

namespace App\Demo\SignUp\Form\Data\Step;

use Symfony\Component\Validator\Constraints as Assert;

class OrganizationDto
{
    #[Assert\NotBlank(groups: ['organization'])]
    public ?string $companyName = null;

    #[Assert\NotBlank(groups: ['organization'])]
    public ?string $address = null;
}

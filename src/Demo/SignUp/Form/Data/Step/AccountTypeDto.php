<?php

namespace App\Demo\SignUp\Form\Data\Step;

use Symfony\Component\Validator\Constraints as Assert;

class AccountTypeDto
{
    #[Assert\NotBlank(groups: ['type'])]
    #[Assert\Choice(choices: ['individual', 'organization'], groups: ['type'])]
    public ?string $type = null;
}

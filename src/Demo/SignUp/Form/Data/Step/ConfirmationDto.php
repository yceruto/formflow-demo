<?php

namespace App\Demo\SignUp\Form\Data\Step;

use Symfony\Component\Validator\Constraints as Assert;

class ConfirmationDto
{
    #[Assert\IsTrue(groups: ['confirmation'])]
    public bool $agreeTerms = false;
}

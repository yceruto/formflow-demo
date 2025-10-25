<?php

namespace App\Demo\Basic\Form\Data;

use Symfony\Component\Validator\Constraints as Assert;

class BasicDto
{
    // Step 1:

    #[Assert\NotBlank(groups: ['step1'])]
    public ?string $field11 = null;

    #[Assert\NotBlank(groups: ['step1'])]
    #[Assert\Length(min: 3, groups: ['step1'])]
    public ?string $field12 = null;


    // Step 2:

    #[Assert\NotBlank(groups: ['step2'])]
    public ?string $field21 = null;

    #[Assert\NotBlank(groups: ['step2'])]
    #[Assert\GreaterThanOrEqual(value: 10, groups: ['step2'])]
    public ?int $field22 = null;


    // Step 3:

    #[Assert\NotBlank(groups: ['step3'])]
    #[Assert\Length(min: 3, groups: ['step3'])]
    public ?string $field31 = null;

    #[Assert\IsTrue(groups: ['step3'])]
    public ?bool $field32 = null;


    // Current step value:

    public ?string $currentStep = null;
}

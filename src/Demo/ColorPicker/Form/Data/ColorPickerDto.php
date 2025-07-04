<?php

namespace App\Demo\ColorPicker\Form\Data;

use Symfony\Component\Validator\Constraints as Assert;

class ColorPickerDto
{
    // Step 1:
    #[Assert\NotBlank(groups: ['step1'])]
    public ?string $mainColor = null;

    // Step 2:
    #[Assert\NotBlank(groups: ['step2'])]
    public ?string $gradientColor = null;

    // Current step value:
    public ?string $currentStep = null;
}

<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Data;

use App\Demo\Kyc\Form\Data\Step\DocumentUploadDto;
use App\Demo\Kyc\Form\Data\Step\PersonalInfoDto;
use Symfony\Component\Validator\Constraints as Assert;

class KycDto
{
    #[Assert\Valid(groups: ['personalInfo'])]
    public ?PersonalInfoDto $personalInfo = null;

    #[Assert\Valid(groups: ['documents'])]
    public ?DocumentUploadDto $documents = null;

    public string $currentStep = 'personalInfo';
}

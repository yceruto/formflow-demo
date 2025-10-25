<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Type\Step;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Review & Submit',
            'help' => 'Please review your information before submitting your KYC application.',
            'inherit_data' => true,
        ]);
    }
}

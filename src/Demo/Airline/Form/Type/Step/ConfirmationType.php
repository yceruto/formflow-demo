<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\BookFlightDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfirmationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('agreeTerms', CheckboxType::class, [
            'label' => 'I agree to the terms and conditions and the cancellation policy.',
            'required' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Confirmation',
            'help' => 'Review your booking and confirm.',
            'data_class' => BookFlightDto::class,
            'inherit_data' => true,
        ]);
    }
}

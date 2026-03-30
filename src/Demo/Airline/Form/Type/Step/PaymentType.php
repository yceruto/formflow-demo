<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\BookFlightDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('paymentMethod', ChoiceType::class, [
            'label' => 'Payment Method',
            'choices' => [
                'Credit Card' => 'credit_card',
                'Debit Card' => 'debit_card',
                'PayPal' => 'paypal',
                'Bank Transfer' => 'bank_transfer',
            ],
            'expanded' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Payment',
            'help' => 'Select your preferred payment method.',
            'data_class' => BookFlightDto::class,
            'inherit_data' => true,
        ]);
    }
}

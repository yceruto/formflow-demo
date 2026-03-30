<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\Step\ContactInfoDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email Address',
                'attr' => ['placeholder' => 'your@email.com'],
                'help' => 'Booking confirmation will be sent to this email.',
            ])
            ->add('phone', TelType::class, [
                'label' => 'Phone Number',
                'attr' => ['placeholder' => '+1234567890'],
                'help' => 'Include country code for flight notifications.',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Contact Information',
            'help' => 'How can we reach you about this booking?',
            'data_class' => ContactInfoDto::class,
        ]);
    }
}

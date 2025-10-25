<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Type\Step;

use App\Demo\Kyc\Form\Data\Step\PersonalInfoDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'attr' => ['placeholder' => 'John'],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'attr' => ['placeholder' => 'Doe'],
            ])
            ->add('dateOfBirth', DateType::class, [
                'label' => 'Date of Birth',
                'widget' => 'single_text',
                'input' => 'string',
                'html5' => true,
            ])
            ->add('phone', TelType::class, [
                'label' => 'Phone Number',
                'attr' => ['placeholder' => '+1234567890'],
                'help' => 'Include country code (e.g., +34 for Spain)',
            ])
            ->add('country', CountryType::class, [
                'label' => 'Country of Residence',
                'placeholder' => 'Select your country',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Personal Information',
            'help' => 'Please provide your personal details for identity verification.',
            'data_class' => PersonalInfoDto::class,
        ]);
    }
}

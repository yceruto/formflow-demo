<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\Step\PassengerDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PassengerDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'attr' => ['placeholder' => 'As shown on travel document'],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'attr' => ['placeholder' => 'As shown on travel document'],
            ])
            ->add('dateOfBirth', DateType::class, [
                'label' => 'Date of Birth',
                'widget' => 'single_text',
                'input' => 'string',
                'html5' => true,
            ])
            ->add('documentType', ChoiceType::class, [
                'label' => 'Document Type',
                'placeholder' => 'Select document type',
                'choices' => [
                    'Passport' => 'passport',
                    'National ID' => 'national_id',
                ],
            ])
            ->add('documentNumber', TextType::class, [
                'label' => 'Document Number',
                'attr' => ['placeholder' => 'Enter document number'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Passenger Details',
            'help' => 'Enter the primary passenger information.',
            'data_class' => PassengerDto::class,
        ]);
    }
}

<?php

namespace App\Demo\SignUp\Form\Type\Step;

use App\Demo\SignUp\Form\Data\SignUpDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfirmationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('agreeTerms', CheckboxType::class, [
            'label' => 'I agree to the terms and conditions',
            'required' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Confirmation',
            'help' => 'Please confirm your registration details.',
            'data_class' => SignUpDto::class,
            'inherit_data' => true,
        ]);
    }
}

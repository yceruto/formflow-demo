<?php

namespace App\Demo\SignUp\Form\Type\Step;

use App\Demo\SignUp\Form\Data\SignUpDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccountTypeSelectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('type', ChoiceType::class, [
            'label' => false,
            'choices' => [
                'Individual' => 'individual',
                'Organization' => 'organization',
            ],
            'expanded' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Account Type',
            'help' => 'Select your account type.',
            'data_class' => SignUpDto::class,
            'inherit_data' => true,
        ]);
    }
}

<?php

namespace App\Demo\SignIn\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Flow\Type\FinishFlowType;
use Symfony\Component\Form\Flow\Type\NextFlowType;
use Symfony\Component\Form\Flow\Type\PreviousFlowType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignInNavigatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('back', PreviousFlowType::class, ['label' => 'Edit']);
        $builder->add('next', NextFlowType::class, ['label' => 'Log in']);
        $builder->add('finish', FinishFlowType::class, ['label' => 'Log in']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => false,
            'mapped' => false,
            'priority' => -100,
        ]);
    }
}

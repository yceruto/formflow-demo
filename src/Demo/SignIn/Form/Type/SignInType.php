<?php

namespace App\Demo\SignIn\Form\Type;

use App\Demo\SignIn\Form\Data\SignInDto;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Flow\AbstractFlowType;
use Symfony\Component\Form\Flow\FormFlowBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignInType extends AbstractFlowType
{
    public function buildFormFlow(FormFlowBuilderInterface $builder, array $options): void
    {
        $builder->addStep('email', EmailType::class);
        $builder->addStep('password', PasswordType::class);

        $builder->add('navigator', SignInNavigatorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SignInDto::class,
            'step_property_path' => 'currentStep',
        ]);
    }
}

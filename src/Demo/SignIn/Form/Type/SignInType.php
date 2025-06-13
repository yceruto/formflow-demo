<?php

namespace App\Demo\SignIn\Form\Type;

use App\Demo\SignIn\Form\Data\SignInDto;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Flow\AbstractFlowType;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowBuilderInterface;

class SignInType extends AbstractFlowType
{
    /**
     * @param FormFlowBuilderInterface $builder
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
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

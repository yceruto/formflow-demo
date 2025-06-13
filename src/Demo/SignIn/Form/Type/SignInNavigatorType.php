<?php

namespace App\Demo\SignIn\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Extension\Core\Type\FormFlowActionType;

class SignInNavigatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('back', FormFlowActionType::class, [
            'label' => 'Edit',
            'action' => 'back',
        ]);

        $builder->add('next', FormFlowActionType::class, [
            'label' => 'Log in',
            'action' => 'next',
        ]);

        $builder->add('finish', FormFlowActionType::class, [
            'label' => 'Log in',
            'action' => 'finish',
        ]);
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

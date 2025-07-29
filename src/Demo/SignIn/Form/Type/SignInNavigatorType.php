<?php

namespace App\Demo\SignIn\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowFinishType;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowNextType;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowPreviousType;

class SignInNavigatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('back', FlowPreviousType::class, ['label' => 'Edit']);
        $builder->add('next', FlowNextType::class, ['label' => 'Log in']);
        $builder->add('finish', FlowFinishType::class, ['label' => 'Log in']);
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

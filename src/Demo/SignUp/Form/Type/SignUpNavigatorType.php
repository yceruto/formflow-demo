<?php

namespace App\Demo\SignUp\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Extension\Core\Type\FormFlowActionType;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowCursor;

class SignUpNavigatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('reset', FormFlowActionType::class, [
            'action' => 'reset',
        ]);

        $builder->add('back_to', FormFlowActionType::class, [
            'action' => 'back',
            'validate' => false,
            'validation_groups' => false,
            'clear_submission' => false,
            'include_if' => fn (FormFlowCursor $cursor) => !$cursor->isFirstStep(),
        ]);

        $builder->add('back', FormFlowActionType::class, [
            'action' => 'back',
        ]);

        $builder->add('next', FormFlowActionType::class, [
            'label' => 'Continue',
            'action' => 'next',
        ]);

        $builder->add('finish', FormFlowActionType::class, [
            'label' => 'Sign Up',
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

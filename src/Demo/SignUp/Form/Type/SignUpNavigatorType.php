<?php

namespace App\Demo\SignUp\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Flow\FlowCursor;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowFinishType;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowNextType;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowPreviousType;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowResetType;

class SignUpNavigatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('reset', FlowResetType::class);
        $builder->add('back_to', FlowPreviousType::class, [
            'validate' => false,
            'validation_groups' => false,
            'clear_submission' => false,
            'include_if' => fn (FlowCursor $cursor) => !$cursor->isFirstStep(),
        ]);
        $builder->add('back', FlowPreviousType::class);
        $builder->add('next', FlowNextType::class, ['label' => 'Continue']);
        $builder->add('finish', FlowFinishType::class, ['label' => 'Sign Up']);
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

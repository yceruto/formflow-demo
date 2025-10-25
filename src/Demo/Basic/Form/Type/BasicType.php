<?php

namespace App\Demo\Basic\Form\Type;

use App\Demo\Basic\Form\Data\BasicDto;
use App\Demo\Basic\Form\Type\Step\Step1Type;
use App\Demo\Basic\Form\Type\Step\Step2Type;
use App\Demo\Basic\Form\Type\Step\Step3Type;
use Symfony\Component\Form\Flow\AbstractFlowType;
use Symfony\Component\Form\Flow\FormFlowBuilderInterface;
use Symfony\Component\Form\Flow\Type\NavigatorFlowType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BasicType extends AbstractFlowType
{
    public function buildFormFlow(FormFlowBuilderInterface $builder, array $options): void
    {
        $builder->addStep('step1', Step1Type::class);
        $builder->addStep('step2', Step2Type::class);
        $builder->addStep('step3', Step3Type::class);

        $builder->add('navigator', NavigatorFlowType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BasicDto::class,
            'step_property_path' => 'currentStep',
        ]);
    }
}

<?php

namespace App\Demo\ColorPicker\Form\Type;

use App\Demo\ColorPicker\Form\Data\ColorPickerDto;
use App\Demo\ColorPicker\Form\Type\Step\Step1Type;
use App\Demo\ColorPicker\Form\Type\Step\Step2Type;
use Symfony\Component\Form\Flow\AbstractFlowType;
use Symfony\Component\Form\Flow\FormFlowBuilderInterface;
use Symfony\Component\Form\Flow\Type\NavigatorFlowType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColorPickerType extends AbstractFlowType
{
    public function buildFormFlow(FormFlowBuilderInterface $builder, array $options): void
    {
        $builder->addStep('step1', Step1Type::class);
        $builder->addStep('step2', Step2Type::class, [
            // necessary when inherit_data is set to true, and
            // you want to access $builder->getData() in Step2Type
            'data' => $builder->getData(),
        ]);

        $builder->add('navigator', NavigatorFlowType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ColorPickerDto::class,
            'step_property_path' => 'currentStep',
        ]);
    }
}

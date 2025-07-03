<?php

namespace App\Demo\ColorPicker\Form\Type;

use App\Demo\ColorPicker\Form\Data\ColorPickerDto;
use App\Demo\ColorPicker\Form\Type\Step\Step1Type;
use App\Demo\ColorPicker\Form\Type\Step\Step2Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Extension\Core\Type\FormFlowNavigatorType;
use Yceruto\FormFlowBundle\Form\Flow\AbstractFlowType;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowBuilderInterface;

class ColorPickerType extends AbstractFlowType
{
    /**
     * @param FormFlowBuilderInterface $builder
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $data = $builder->getDataStorage()->load();
        $mainColor = $data instanceof ColorPickerDto ? $data->mainColor : null;
        $builder->addStep('step1', Step1Type::class);
        $builder->addStep('step2', Step2Type::class, ['main_color' => $mainColor]);

        $builder->add('navigator', FormFlowNavigatorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ColorPickerDto::class,
            'step_property_path' => 'currentStep',
        ]);
    }
}

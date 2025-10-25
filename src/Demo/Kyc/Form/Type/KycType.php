<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Type;

use App\Demo\Kyc\Form\Data\KycDto;
use App\Demo\Kyc\Form\Type\Step\DocumentUploadType;
use App\Demo\Kyc\Form\Type\Step\PersonalInfoType;
use App\Demo\Kyc\Form\Type\Step\ReviewType;
use Symfony\Component\Form\Flow\AbstractFlowType;
use Symfony\Component\Form\Flow\FormFlowBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KycType extends AbstractFlowType
{
    public function buildFormFlow(FormFlowBuilderInterface $builder, array $options): void
    {
        $builder
            ->addStep('personalInfo', PersonalInfoType::class)
            ->addStep('documents', DocumentUploadType::class)
            ->addStep('review', ReviewType::class);

        $builder->add('navigator', KycNavigatorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => KycDto::class,
            'step_property_path' => 'currentStep',
        ]);
    }
}

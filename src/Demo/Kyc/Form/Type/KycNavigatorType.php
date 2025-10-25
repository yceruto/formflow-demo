<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Flow\FormFlowCursor;
use Symfony\Component\Form\Flow\Type\FinishFlowType;
use Symfony\Component\Form\Flow\Type\NextFlowType;
use Symfony\Component\Form\Flow\Type\PreviousFlowType;
use Symfony\Component\Form\Flow\Type\ResetFlowType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KycNavigatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reset', ResetFlowType::class, [
                'label' => 'Start Over',
            ])
            ->add('back', PreviousFlowType::class, [
                'label' => 'Back',
            ])
            ->add('next', NextFlowType::class, [
                'label' => 'Continue',
                'include_if' => fn (FormFlowCursor $cursor): bool => $cursor->getCurrentStep() !== 'documents' && $cursor->canMoveNext(),
            ])
            ->add('upload', UploadFlowType::class, [
                'label' => 'Upload Documents',
            ])
            ->add('finish', FinishFlowType::class, [
                'label' => 'Submit KYC',
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

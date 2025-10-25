<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Type\Step;

use App\Demo\Kyc\Form\Data\Step\DocumentUploadDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentUploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idDocumentFile', FileType::class, [
                'label' => 'ID Document',
                'help' => 'Upload a photo or scan of your passport, driver\'s license, or national ID card (max 5MB, JPEG/PNG/PDF)',
                'required' => false,
                'attr' => [
                    'accept' => 'image/jpeg,image/png,application/pdf',
                ],
            ])
            ->add('proofOfAddressFile', FileType::class, [
                'label' => 'Proof of Address',
                'help' => 'Upload a recent utility bill, bank statement, or official document showing your address (max 5MB, JPEG/PNG/PDF)',
                'required' => false,
                'attr' => [
                    'accept' => 'image/jpeg,image/png,application/pdf',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Document Upload',
            'help' => 'Upload your identification documents for verification.',
            'data_class' => DocumentUploadDto::class,
        ]);
    }
}

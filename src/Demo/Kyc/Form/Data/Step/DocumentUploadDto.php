<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Data\Step;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class DocumentUploadDto
{
    /**
     * Temporary file for ID document (not persisted in session).
     */
    #[Assert\NotBlank(message: 'Please upload your ID document', groups: ['documents'])]
    #[Assert\File(
        maxSize: '5M',
        mimeTypes: ['image/jpeg', 'image/png', 'application/pdf'],
        mimeTypesMessage: 'Please upload a valid document (JPEG, PNG or PDF)',
        groups: ['documents']
    )]
    public ?UploadedFile $idDocumentFile = null;

    /**
     * Temporary file for proof of address (not persisted in session).
     */
    #[Assert\NotBlank(message: 'Please upload your proof of address', groups: ['documents'])]
    #[Assert\File(
        maxSize: '5M',
        mimeTypes: ['image/jpeg', 'image/png', 'application/pdf'],
        mimeTypesMessage: 'Please upload a valid document (JPEG, PNG or PDF)',
        groups: ['documents']
    )]
    public ?UploadedFile $proofOfAddressFile = null;

    /**
     * Stored file path for ID document (persisted in session).
     */
    public ?string $idDocumentPath = null;

    /**
     * Stored file path for proof of address (persisted in session).
     */
    public ?string $proofOfAddressPath = null;
}

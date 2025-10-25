<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Service;

use App\Demo\Kyc\Form\Data\Step\DocumentUploadDto;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

final readonly class DocumentUploadHandler
{
    public function __construct(
        #[Autowire('%kernel.project_dir%/private/uploads')]
        private string $uploadDirectory,
        private SluggerInterface $slugger,
        private Filesystem $filesystem,
    ) {
    }

    public function handleUpload(DocumentUploadDto $dto): void
    {
        // Handle ID document upload
        if ($dto->idDocumentFile instanceof UploadedFile) {
            if ($dto->idDocumentPath) {
                $this->removeFile($dto->idDocumentPath);
            }

            $dto->idDocumentPath = $this->saveFile($dto->idDocumentFile);
            $dto->idDocumentFile = null; // Clear the uploaded file to avoid session serialization issues
        }

        // Handle proof of address upload
        if ($dto->proofOfAddressFile instanceof UploadedFile) {
            if ($dto->proofOfAddressPath) {
                $this->removeFile($dto->proofOfAddressPath);
            }

            $dto->proofOfAddressPath = $this->saveFile($dto->proofOfAddressFile);
            $dto->proofOfAddressFile = null; // Clear the uploaded file
        }
    }

    private function saveFile(UploadedFile $file): string
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        $file->move($this->uploadDirectory, $fileName);

        return $fileName;
    }

    private function removeFile(string $filePath): void
    {
        $this->filesystem->remove($this->uploadDirectory.DIRECTORY_SEPARATOR.$filePath);
    }
}

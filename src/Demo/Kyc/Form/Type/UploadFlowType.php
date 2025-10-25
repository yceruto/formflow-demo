<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Form\Type;

use App\Demo\Kyc\Form\Data\KycDto;
use App\Demo\Kyc\Service\DocumentUploadHandler;
use Symfony\Component\Form\Flow\AbstractButtonFlowType;
use Symfony\Component\Form\Flow\ButtonFlowInterface;
use Symfony\Component\Form\Flow\FormFlowCursor;
use Symfony\Component\Form\Flow\FormFlowInterface;
use Symfony\Component\Form\Flow\Type\NextFlowType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadFlowType extends AbstractButtonFlowType
{
    public function __construct(
        private readonly DocumentUploadHandler $uploadHandler,
    ) {
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'handler' => function (mixed $data, ButtonFlowInterface $button, FormFlowInterface $flow): void {
                /** @var KycDto $data */
                $data = $flow->getData();

                // Handle file uploads before moving to next step
                $this->uploadHandler->handleUpload($data->documents);

                // Move to the next step
                $flow->moveNext();
            },
            'include_if' => fn (FormFlowCursor $cursor): bool => $cursor->getCurrentStep() === 'documents' && $cursor->canMoveNext(),
        ]);
    }

    public function getParent(): string
    {
        return NextFlowType::class;
    }
}

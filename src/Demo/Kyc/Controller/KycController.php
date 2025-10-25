<?php

declare(strict_types=1);

namespace App\Demo\Kyc\Controller;

use App\Demo\Kyc\Form\Data\KycDto;
use App\Demo\Kyc\Form\Type\KycType;
use App\Turbo\Controller\TurboFlowTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Flow\FormFlowInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class KycController extends AbstractController
{
    use TurboFlowTrait;

    #[Route('/demo/kyc', name: 'app_demo_kyc')]
    public function __invoke(Request $request): Response
    {
        /** @var FormFlowInterface $flow */
        $flow = $this->createForm(KycType::class, new KycDto())
            ->handleRequest($request);

        if ($flow->isSubmitted() && $flow->isValid() && $flow->isFinished()) {
            $data = $flow->getData();

            // At this point, files are already uploaded and paths are stored in the DTO
            // You can process the KYC submission here (e.g., save to database, send notification, etc.)

            $this->addFlash('success', 'Your KYC verification has been successfully submitted!');

            return $this->redirectToRoute('app_demo_kyc');
        }

        return $this->render('demo/kyc/flow.html.twig', [
            'form' => $flow,
        ]);
    }
}
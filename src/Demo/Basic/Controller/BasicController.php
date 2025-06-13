<?php

namespace App\Demo\Basic\Controller;

use App\Demo\Basic\Form\Data\BasicDto;
use App\Demo\Basic\Form\Type\BasicType;
use App\Turbo\Controller\TurboFlowTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowInterface;

class BasicController extends AbstractController
{
    use TurboFlowTrait;

    #[Route('/demo/basic', name: 'app_demo_basic')]
    public function __invoke(Request $request): Response
    {
        /** @var FormFlowInterface $flow */
        $flow = $this->createForm(BasicType::class, new BasicDto())
            ->handleRequest($request);

        if ($flow->isSubmitted() && $flow->isValid() && $flow->isFinished()) {
            // do something with $flow->getData();

            $this->addFlash('success', 'Your form flow was successfully finished!');

            return $this->redirectToRoute('app_demo_basic');
        }

        return $this->render('demo/basic.html.twig', [
            'form' => $flow,
        ]);
    }
}

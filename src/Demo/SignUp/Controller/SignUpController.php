<?php

namespace App\Demo\SignUp\Controller;

use App\Demo\SignUp\Form\Data\SignUpDto;
use App\Demo\SignUp\Form\Type\SignUpType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Flow\FormFlowInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SignUpController extends AbstractController
{
    #[Route('/demo/signup', name: 'app_demo_signup')]
    public function __invoke(Request $request): Response
    {
        /** @var FormFlowInterface $flow */
        $flow = $this->createForm(SignUpType::class, new SignUpDto())
            ->handleRequest($request);

        if ($flow->isSubmitted() && $flow->isValid() && $flow->isFinished()) {
            // $flow->getData() ...

            $this->addFlash('success', 'You have been successfully signed up!');

            return $this->redirectToRoute('app_demo_signup');
        }

        return $this->render('demo/signup/flow.html.twig', [
            'form' => $flow->getStepForm(),
        ]);
    }
}

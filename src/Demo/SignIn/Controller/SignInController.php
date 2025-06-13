<?php

namespace App\Demo\SignIn\Controller;

use App\Demo\SignIn\Form\Data\SignInDto;
use App\Demo\SignIn\Form\Type\SignInType;
use App\Turbo\Controller\TurboFlowTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowInterface;

class SignInController extends AbstractController
{
    use TurboFlowTrait;

    #[Route('/demo/signin', name: 'app_demo_signin')]
    public function __invoke(Request $request): Response
    {
        /** @var FormFlowInterface $flow */
        $flow = $this->createForm(SignInType::class, new SignInDto())
            ->handleRequest($request);

        if ($flow->isSubmitted() && $flow->isValid() && $flow->isFinished()) {
            // TODO: implement custom staged authenticator

            $this->addFlash('success', 'You have been successfully signed in!');

            return $this->redirectToRoute('app_demo_signin');
        }

        return $this->render('demo/signin.html.twig', [
            'form' => $flow,
        ]);
    }
}

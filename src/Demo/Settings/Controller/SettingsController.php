<?php

namespace App\Demo\Settings\Controller;

use App\Demo\Settings\Form\Data\SettingsDto;
use App\Demo\Settings\Form\Type\SettingsType;
use App\Demo\Settings\Repository\AccountRepositoryInterface;
use App\Turbo\Controller\TurboFlowTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowInterface;

class SettingsController extends AbstractController
{
    use TurboFlowTrait;

    public function __construct(
        private readonly AccountRepositoryInterface $repository,
    ) {
    }

    #[Route('/demo/settings', name: 'app_demo_settings')]
    public function __invoke(Request $request, #[MapQueryParameter] string $tab = 'details'): Response
    {
        $account = $this->repository->current();

        /** @var FormFlowInterface $form */
        $form = $this->createForm(SettingsType::class, $account, ['tab' => $tab])
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && null === $form->getClickedActionButton()) {
            $this->repository->save($account);

            $this->addFlash('success', 'Your information has been updated!');

            return $this->redirectToRoute('app_demo_settings', ['tab' => $tab]);
        }

        return $this->render('demo/settings/form.html.twig', [
            'form' => $form,
        ]);
    }
}

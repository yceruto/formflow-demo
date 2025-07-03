<?php

namespace App\Demo\ColorPicker\Controller;

use App\Demo\ColorPicker\Form\Data\ColorPickerDto;
use App\Demo\ColorPicker\Form\Type\ColorPickerType;
use App\Turbo\Controller\TurboFlowTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Yceruto\FormFlowBundle\Form\Flow\DataStorage\SessionDataStorage;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowInterface;

class ColorPickerController extends AbstractController
{
    use TurboFlowTrait;

    public function __construct(
        private readonly RequestStack $requestStack,
    )
    {
    }

    #[Route('/demo/color-picker', name: 'app_demo_color_picker')]
    public function __invoke(Request $request): Response
    {

        /** @var FormFlowInterface $flow */
        $flow = $this->createForm(ColorPickerType::class, new ColorPickerDto(), ['data_storage' => new SessionDataStorage('color_picker_flow', $this->requestStack)])
            ->handleRequest($request);

        if ($flow->isSubmitted() && $flow->isValid() && $flow->isFinished()) {
            // do something with $flow->getData();

            $this->addFlash('success', 'Your form flow was successfully finished!');

            return $this->redirectToRoute('app_demo_color_picker');
        }

        return $this->render('demo/color_picker.html.twig', [
            'form' => $flow,
        ]);
    }
}

<?php

namespace App\Demo\ColorPicker\Controller;

use App\Demo\ColorPicker\Form\Data\ColorPickerDto;
use App\Demo\ColorPicker\Form\Type\ColorPickerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Flow\FormFlowInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ColorPickerController extends AbstractController
{
    #[Route('/demo/color-picker', name: 'app_demo_color_picker')]
    public function __invoke(Request $request): Response
    {
        /** @var FormFlowInterface $flow */
        $flow = $this->createForm(ColorPickerType::class, new ColorPickerDto())
            ->handleRequest($request);

        if ($flow->isSubmitted() && $flow->isValid() && $flow->isFinished()) {
            // do something with $flow->getData();

            $this->addFlash('success', 'Your form flow was successfully finished!');

            return $this->redirectToRoute('app_demo_color_picker');
        }

        return $this->render('demo/color_picker.html.twig', [
            'form' => $flow->getStepForm(),
        ]);
    }
}

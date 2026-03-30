<?php

declare(strict_types=1);

namespace App\Demo\Airline\Controller;

use App\Demo\Airline\Form\Data\BookFlightDto;
use App\Demo\Airline\Form\Data\Step\ContactInfoDto;
use App\Demo\Airline\Form\Data\Step\PassengerDto;
use App\Demo\Airline\Form\Type\BookFlightType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Flow\FormFlowInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookFlightController extends AbstractController
{
    #[Route('/demo/book-flight', name: 'app_demo_book_flight')]
    public function __invoke(Request $request): Response
    {
        $data = new BookFlightDto();
        $data->passengerDetails = new PassengerDto();
        $data->contactInfo = new ContactInfoDto();

        /** @var FormFlowInterface $flow */
        $flow = $this->createForm(BookFlightType::class, $data)
            ->handleRequest($request);

        if ($flow->isSubmitted() && $flow->isValid() && $flow->isFinished()) {
            $this->addFlash('success', 'Your flight has been booked successfully!');

            return $this->redirectToRoute('app_demo_book_flight');
        }

        return $this->render('demo/airline/flow.html.twig', [
            'form' => $flow->getStepForm(),
        ]);
    }
}

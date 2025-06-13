<?php

namespace App\Turbo\Controller;

use Symfony\Component\HttpFoundation\Response;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowInterface;

/**
 * Ensures the flow step is created `$v->getForm()`,
 * and the status code is 303 until the flow is finished.
 */
trait TurboFlowTrait
{
    public function render(string $view, array $parameters = [], ?Response $response = null): Response
    {
        $response ??= new Response();

        foreach ($parameters as $k =>$flow) {
            if (!$flow instanceof FormFlowInterface) {
                continue;
            }

            $parameters[$k] = $flow->getStepForm();

            if (200 !== $response->getStatusCode()) {
                continue;
            }

            $response->setStatusCode(match (true) {
                !$flow->isSubmitted() => 200,
                !$flow->isValid() => 422,
                !$flow->isFinished() => 303,
            });
        }

        return parent::render($view, $parameters, $response);
    }
}

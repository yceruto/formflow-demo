<?php

namespace App\Demo\Settings\Form\StepAccessor;

use Yceruto\FormFlowBundle\Form\Flow\StepAccessor\StepAccessorInterface;

final readonly class FixedStepAccessor implements StepAccessorInterface
{
    public function __construct(
        private string $step,
    ) {
    }

    public function getStep(object|array $data, ?string $default = null): ?string
    {
        return $this->step;
    }

    public function setStep(object|array &$data, string $step): void
    {
        // no-op
    }
}

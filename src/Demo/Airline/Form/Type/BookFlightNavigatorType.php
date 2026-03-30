<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Flow\FormFlowCursor;
use Symfony\Component\Form\Flow\Type\FinishFlowType;
use Symfony\Component\Form\Flow\Type\NextFlowType;
use Symfony\Component\Form\Flow\Type\PreviousFlowType;
use Symfony\Component\Form\Flow\Type\ResetFlowType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookFlightNavigatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('reset', ResetFlowType::class);
        $builder->add('back', PreviousFlowType::class);
        $builder->add('next', NextFlowType::class, ['label' => 'Continue']);
        $builder->add('finish', FinishFlowType::class, ['label' => 'Book Flight']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => false,
            'mapped' => false,
            'priority' => -100,
        ]);
    }
}

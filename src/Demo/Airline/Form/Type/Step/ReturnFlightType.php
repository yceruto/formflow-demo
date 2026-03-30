<?php

declare(strict_types=1);

namespace App\Demo\Airline\Form\Type\Step;

use App\Demo\Airline\Form\Data\BookFlightDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReturnFlightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('returnDate', DateType::class, [
            'label' => 'Return Date',
            'widget' => 'single_text',
            'input' => 'string',
            'html5' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Return Flight',
            'help' => 'Select your return date.',
            'data_class' => BookFlightDto::class,
            'inherit_data' => true,
        ]);
    }
}

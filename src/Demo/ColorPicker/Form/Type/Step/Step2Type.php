<?php

namespace App\Demo\ColorPicker\Form\Type\Step;

use App\Demo\ColorPicker\Form\Data\ColorPickerDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Step2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $mainColor = $options['main_color'];
        assert(is_string($mainColor), 'Main color must be a string');
        $gradients = [
            'Lighter' => $this->adjustBrightness($mainColor, 40),
            'Original' => $mainColor,
            'Darker' => $this->adjustBrightness($mainColor, -40),
        ];

        $builder->add('gradientColor', ChoiceType::class, [
            'label' => 'Gradient Color',
            'choices' => $gradients,
            'choice_label' => function ($choice, $value) {
                return $value . ' (' . $choice . ')';
            },
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ColorPickerDto::class,
            'inherit_data' => true,
            'main_color' => null,
        ]);
    }

    private function adjustBrightness(string $hexColor, int $amount): string
    {
        $hex = ltrim($hexColor, '#');

        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $r = max(0, min(255, $r + $amount));
        $g = max(0, min(255, $g + $amount));
        $b = max(0, min(255, $b + $amount));

        return sprintf("#%02X%02X%02X", $r, $g, $b);
    }
}

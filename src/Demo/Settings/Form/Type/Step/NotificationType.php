<?php

namespace App\Demo\Settings\Form\Type\Step;

use App\Demo\Settings\Model\Notification;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('enabled', CheckboxType::class, ['required' => false]);
        $builder->add('email', CheckboxType::class, ['required' => false]);
        $builder->add('sms', CheckboxType::class, ['required' => false]);
        $builder->add('mobile', CheckboxType::class, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => false,
            'help' => 'Manage your notifications',
            'data_class' => Notification::class,
        ]);
    }
}

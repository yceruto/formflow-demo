<?php

namespace App\Demo\Settings\Form\Type\Step;

use App\Demo\Settings\Form\Type\Step\Inner\LocationType;
use App\Demo\Settings\Form\Type\Step\Inner\PersonalType;
use App\Demo\Settings\Model\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('personal', PersonalType::class);
        $builder->add('location', LocationType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => false,
            'help' => 'Set your profile and location information',
            'data_class' => Account::class,
            'inherit_data' => true,
        ]);
    }
}

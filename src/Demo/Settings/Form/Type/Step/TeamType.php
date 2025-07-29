<?php

namespace App\Demo\Settings\Form\Type\Step;

use App\Demo\Settings\Form\Type\Step\Inner\MemberType;
use App\Demo\Settings\Model\Account;
use App\Demo\Settings\Model\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowButtonType;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('team', CollectionType::class, [
            'label' => 'Members',
            'entry_type' => MemberType::class,
            'prototype' => false,
            'allow_add' => true,
            'allow_delete' => true,
            'error_bubbling' => false,
        ]);

        $builder->add('add', FlowButtonType::class, [
            'validate' => false,
            'validation_groups' => false,
            'handler' => function (Account $data) {
                $data->team[] = new Member();
            },
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => false,
            'help' => 'Manage your team members',
            'data_class' => Account::class,
            'inherit_data' => true,
        ]);
    }
}

<?php

namespace App\Demo\Settings\Form\Type\Step\Inner;

use App\Demo\Settings\Model\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Flow\FlowButtonInterface;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowInterface;
use Yceruto\FormFlowBundle\Form\Flow\Type\FlowButtonType;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('name', TextType::class, ['empty_data' => '']);
        $builder->add('role', ChoiceType::class, [
            'choices' => [
                'Admin' => 'admin',
                'User' => 'user',
            ],
        ]);

        $builder->add('remove', FlowButtonType::class, [
            'label' => false,
            'validate' => false,
            'validation_groups' => false,
            'handler' => function (Member $data, FlowButtonInterface $button, FormFlowInterface $flow) {
                unset($flow->getData()->team[$button->getViewData()]);
            },
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
}

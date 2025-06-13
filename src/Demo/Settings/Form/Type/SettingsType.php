<?php

namespace App\Demo\Settings\Form\Type;

use App\Demo\Settings\Form\StepAccessor\FixedStepAccessor;
use App\Demo\Settings\Form\Type\Step\DetailsType;
use App\Demo\Settings\Form\Type\Step\NotificationType;
use App\Demo\Settings\Form\Type\Step\ProfileType;
use App\Demo\Settings\Form\Type\Step\TeamType;
use App\Demo\Settings\Model\Account;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Flow\AbstractFlowType;
use Yceruto\FormFlowBundle\Form\Flow\DataStorage\NullDataStorage;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowBuilderInterface;

class SettingsType extends AbstractFlowType
{
    /**
     * @param FormFlowBuilderInterface $builder
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addStep('details', DetailsType::class);
        $builder->addStep('profile', ProfileType::class);
        $builder->addStep('team', TeamType::class);
        $builder->addStep('notification', NotificationType::class);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->define('tab')
            ->required()
            ->allowedTypes('string');

        $resolver->setDefaults([
            'data_class' => Account::class,
            'data_storage' => new NullDataStorage(),
            'step_accessor' => fn (Options $options) => new FixedStepAccessor($options['tab']),
        ]);
    }
}

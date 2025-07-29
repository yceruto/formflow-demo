<?php

namespace App\Demo\SignUp\Form\Type;

use App\Demo\SignUp\Form\Data\SignUpDto;
use App\Demo\SignUp\Form\Type\Step\AccountTypeSelectionType;
use App\Demo\SignUp\Form\Type\Step\ConfirmationType;
use App\Demo\SignUp\Form\Type\Step\CredentialsType;
use App\Demo\SignUp\Form\Type\Step\IndividualType;
use App\Demo\SignUp\Form\Type\Step\OrganizationType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yceruto\FormFlowBundle\Form\Flow\AbstractFlowType;
use Yceruto\FormFlowBundle\Form\Flow\FormFlowBuilderInterface;

class SignUpType extends AbstractFlowType
{
    public function buildFormFlow(FormFlowBuilderInterface $builder, array $options): void
    {
        $builder->addStep('type', AccountTypeSelectionType::class);
        $builder->addStep('individual', IndividualType::class, skip: fn (SignUpDto $data) => $data->type !== 'individual');
        $builder->addStep('organization', OrganizationType::class, skip: fn (SignUpDto $data) => $data->type !== 'organization');
        $builder->addStep('credentials', CredentialsType::class);
        $builder->addStep('confirmation', ConfirmationType::class);

        $builder->add('navigator', SignUpNavigatorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SignUpDto::class,
            'step_property_path' => 'currentStep',
        ]);
    }
}

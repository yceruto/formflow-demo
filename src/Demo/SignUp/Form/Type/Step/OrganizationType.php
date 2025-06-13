<?php

namespace App\Demo\SignUp\Form\Type\Step;

use App\Demo\SignUp\Form\Data\Step\OrganizationDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganizationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class)
            ->add('address', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'Organization',
            'help' => 'Please provide your organization details.',
            'data_class' => OrganizationDto::class,
        ]);
    }
}

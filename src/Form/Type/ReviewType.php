<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Validation;

final class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->add('companyName', TextType::class, [
            'constraints' => [
                new NotNull(message: 'review.assert.companyName.null'),
                new Length(min: 3, max: 255),
            ],
            'label' => 'review.companyName.label',
            'label_attr' => [
                'class' => 'form-label',
            ],
            'attr' => [
                'class' => 'form-control',
            ],
        ]);
        $builder->add('rating', StarRatingType::class, [
            'required' => true,
            'label' => 'review.rating.label',
            'constraints' => [
                new NotNull(message: 'review.assert.rating.null'),
            ],
        ]);
        $builder->add('reviewText', TextareaType::class, [
            'required' => false,
            'label' => 'review.reviewText.label',
            'attr' => [
                'class' => 'form-control',
            ],
        ]);
        $builder->add('authorEmail', EmailType::class, [
            'label' => 'review.authorEmail.label',
            'constraints' => [
                new Email(),
            ],
            'label_attr' => [
                'class' => 'form-label',
            ],
            'attr' => [
                'class' => 'form-control',
            ],
        ]);
        $builder->add('submit', SubmitType::class, [
            'attr' => [
                'class' => 'mt-3'
            ]
        ]);
    }
}

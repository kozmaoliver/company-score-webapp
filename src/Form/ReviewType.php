<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->add('companyName', TextType::class, [
            'constraints' => [
                new NotNull(message: 'review.assert.companyName.null'),
                new Length(min: 3, max: 255),
            ],
        ]);
        $builder->add('rating', StarRatingType::class, [
            'required' => true,
            'constraints' => [
                new NotNull(message: 'review.assert.rating.null'),
            ],
        ]);
        $builder->add('reviewText', TextareaType::class, [
            'required' => false,
        ]);
        $builder->add('authorEmail', EmailType::class, [
            'constraints' => [
                new Email(),
            ],
        ]);
        $builder->add('submit', SubmitType::class);
    }
}

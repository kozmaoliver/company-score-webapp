<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotNull;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->add('companyName');
        $builder->add('rating', StarRatingType::class, [
            'required' => true,
            'constraints' => [
                new NotNull(message: 'review.assert.rating.null')
            ]
        ]);
        $builder->add('reviewText', TextareaType::class, [
            'required' => false
        ]);
        $builder->add('authorEmail', EmailType::class);
        $builder->add('submit', SubmitType::class);
    }
}

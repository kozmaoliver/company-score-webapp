<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StarRatingType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
            ],
            'expanded' => true,
            'multiple' => false,
            'attr' => ['class' => 'star-rating'],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['stars'] = [1, 2, 3, 4, 5];
    }

    public function getBlockPrefix(): string
    {
        return 'star_rating';
    }
}

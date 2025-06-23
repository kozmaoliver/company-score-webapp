<?php

namespace App\Tests\Form\Type;

use App\Entity\Review;
use App\Form\Type\ReviewType;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;

class ReviewTypeTest extends TypeTestCase
{
    protected function getExtensions(): array
    {
        $validator = Validation::createValidator();

        return [
            new ValidatorExtension($validator),
        ];
    }

    public function testSubmitValidData(): void
    {
        $formData = [
            'companyName' => 'Test Company',
            'rating' => 5,
            'reviewText' => 'Great company',
            'authorEmail' => 'test@example.com',
        ];

        $model = new Review();

        $form = $this->factory->create(ReviewType::class, $model);
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals('Test Company', $model->getCompanyName());
        $this->assertEquals(5, $model->getRating());
        $this->assertEquals('Great company', $model->getReviewText());
        $this->assertEquals('test@example.com', $model->getAuthorEmail());
    }

    public function testSubmitInvalidData(): void
    {
        // 1 invalid input
        $formData = [
            'companyName' => 'T',
            'rating' => 5,
            'reviewText' => 'Great company',
            'authorEmail' => 'test@example.com',
        ];

        $model = new Review();

        $form = $this->factory->create(ReviewType::class, $model);
        $form->submit($formData);

        $this->assertCount(1, $form->getErrors(true));

        // 3 invalid inputs
        $formData = [
            'companyName' => 'T',
            'rating' => -1,
            'reviewText' => 'Great company',
            'authorEmail' => 'Not an email',
        ];

        $model = new Review();

        $form = $this->factory->create(ReviewType::class, $model);
        $form->submit($formData);

        $this->assertCount(3, $form->getErrors(true));
    }
}


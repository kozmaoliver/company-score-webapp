<?php

namespace App\DataFixtures;

use App\Entity\Review;
use App\Factory\Contracts\EntityFactoryInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class ReviewFixture extends Fixture
{
    private const REVIEWS = [
        [
            'companyName' => 'Apple Inc.',
            'rating' => 2,
            'reviewText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            'authorEmail' => 'feri@mail.com',
            'createdAt' => '2025-06-03'
        ],
        [
            'companyName' => 'Google LLC',
            'rating' => 5,
            'reviewText' => 'Excellent service and cutting-edge products.',
            'authorEmail' => 'nora@gmail.com',
            'createdAt' => '2025-06-05'
        ],
        [
            'companyName' => 'Microsoft Corporation',
            'rating' => 3,
            'reviewText' => 'Decent tools, but support could be better.',
            'authorEmail' => 'tamas@microsoftfans.hu',
            'createdAt' => '2025-06-06'
        ],
        [
            'companyName' => 'Amazon',
            'rating' => 1,
            'reviewText' => 'Terrible customer experience and delays.',
            'authorEmail' => 'zsuzsa@webmail.com',
            'createdAt' => '2025-06-02'
        ],
        [
            'companyName' => 'OpenAI',
            'rating' => 4,
            'reviewText' => 'Innovative and responsive. Great tech!',
            'authorEmail' => 'daniel@world.net',
            'createdAt' => '2025-06-04'
        ]
    ];


    public function __construct(
        private readonly EntityFactoryInterface $entityFactory,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::REVIEWS as $reviewData) {
            $review = $this->entityFactory->create(Review::class);

            $review->setCompanyName($reviewData['companyName']);
            $review->setRating($reviewData['rating']);
            $review->setReviewText($reviewData['reviewText']);
            $review->setAuthorEmail($reviewData['authorEmail']);
            $review->setCreatedAt(new \DateTimeImmutable($reviewData['createdAt']));

            $this->entityManager->persist($review);
        }

        $this->entityManager->flush();
    }
}

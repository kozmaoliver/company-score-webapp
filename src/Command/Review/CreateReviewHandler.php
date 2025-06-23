<?php

namespace App\Command\Review;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateReviewHandler
{
    public function __construct(
        private readonly EntityManagerInterface $em
    ) {
    }

    public function __invoke(CreateReviewCommand $command): void
    {
        $this->em->persist($command->review);
        $this->em->flush();
    }
}

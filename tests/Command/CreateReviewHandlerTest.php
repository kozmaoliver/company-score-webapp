<?php

namespace App\Tests\Command;

use App\Command\Review\CreateReviewCommand;
use App\Command\Review\CreateReviewHandler;
use App\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class CreateReviewHandlerTest extends TestCase
{
    public function testHandlerIsCalledOnce(): void
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $review = new Review();

        $entityManager->expects($this->once())
            ->method('persist')
            ->with($review);

        $entityManager->expects($this->once())
            ->method('flush');

        $handler = new CreateReviewHandler($entityManager);

        $command = new CreateReviewCommand($review);

        $handler->__invoke($command);
    }
}

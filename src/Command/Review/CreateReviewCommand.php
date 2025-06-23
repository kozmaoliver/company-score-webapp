<?php

namespace App\Command\Review;

use App\Entity\Review;

class CreateReviewCommand
{
    public function __construct(
        public Review $review
    ) {
    }
}

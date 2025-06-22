<?php

namespace App\Entity;

use App\Entity\Shared\CreationDateAwareEntity;
use App\Entity\Shared\CreationDateAwareInterface;
use App\Entity\Shared\EntityInterface;
use App\Entity\Shared\IdentifiableEntity;
use App\Entity\Shared\IdentifiableEntityInterface;
use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Review implements EntityInterface, IdentifiableEntityInterface, CreationDateAwareInterface
{
    use IdentifiableEntity;
    use CreationDateAwareEntity;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $companyName = null;

    #[ORM\Column(type: 'smallint', options: ['unsigned' => true])]
    private ?int $rating = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $reviewText = null;

    #[ORM\Column(type: 'string')]
    private ?string $authorEmail = null;

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): void
    {
        $this->rating = $rating;
    }

    public function getReviewText(): ?string
    {
        return $this->reviewText;
    }

    public function setReviewText(?string $reviewText): void
    {
        $this->reviewText = $reviewText;
    }

    public function getAuthorEmail(): ?string
    {
        return $this->authorEmail;
    }

    public function setAuthorEmail(?string $authorEmail): void
    {
        $this->authorEmail = $authorEmail;
    }
}

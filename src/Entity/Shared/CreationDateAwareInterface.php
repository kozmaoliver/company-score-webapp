<?php

namespace App\Entity\Shared;

use DateTimeImmutable;

interface CreationDateAwareInterface
{
    public function getCreatedAt(): ?DateTimeImmutable;

    public function setCreatedAt(DateTimeImmutable $createdAt): void;
}

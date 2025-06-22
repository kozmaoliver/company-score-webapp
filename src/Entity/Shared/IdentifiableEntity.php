<?php

namespace App\Entity\Shared;

use Doctrine\ORM\Mapping as ORM;

trait IdentifiableEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\Column(type: 'integer', unique: true, options: ['unsigned' => true])]
    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }
}

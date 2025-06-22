<?php

namespace App\Factory;

use App\Entity\Shared\EntityInterface;
use App\Factory\Contracts\EntityFactoryInterface;

class EntityFactory implements EntityFactoryInterface
{
    public function create(string $className, array $options = []): EntityInterface
    {
        return new $className();
    }
}

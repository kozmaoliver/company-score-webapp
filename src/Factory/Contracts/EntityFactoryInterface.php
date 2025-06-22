<?php

namespace App\Factory\Contracts;

use App\Entity\Shared\EntityInterface;

interface EntityFactoryInterface
{
    /**
     * @template T
     * @param class-string<T> $className
     * @param array $options
     * @return T
     */
    public function create(string $className, array $options = []): EntityInterface;
}

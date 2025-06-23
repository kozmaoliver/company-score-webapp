<?php

namespace App\Tests\Factory;

use App\Factory\EntityFactory;
use PHPUnit\Framework\TestCase;
use App\Entity\Review;

class EntityFactoryTest extends TestCase
{
    private EntityFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new EntityFactory();
    }

    public function testCreate(): void
    {
        $entity = $this->factory->create(Review::class);

        $this->assertInstanceOf(Review::class, $entity);
    }

    public function testCreateWithOptions(): void
    {
        $entity = $this->factory->create(Review::class, ['some_option' => 'value']);

        $this->assertInstanceOf(Review::class, $entity);
    }

    public function testCreateWithInvalidClass(): void
    {
        $this->expectException(\Error::class);

        $this->factory->create('DefinitelyNotAClass');
    }
}

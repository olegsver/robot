<?php

namespace Robot\Tests\Components\ResponseBuilder;

use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Dto\Coord;
use Robot\Dto\Response;
use Robot\Dto\StartPosition;
use Robot\Interfaces\LoggerInterface;
use Robot\Tests\BaseTestCase;

class ResponseBuilderTest extends BaseTestCase
{
    public function testGetResponse(): void
    {
        $builder = $this->getBuilder();
        $result = $builder->getResponse();
        $this->assertInstanceOf(Response::class, $result);
    }

    public function testSetVisited(): void
    {
        $builder = $this->getBuilder();
        $builder->setVisited(22, 3);
        $result = $builder->getResponse();
        $this->assertCount(1, $result->visited);
        $this->assertInstanceOf(Coord::class, $result->visited[0]);
        $this->assertSame(22, $result->visited[0]->X);
        $this->assertSame(3, $result->visited[0]->Y);
    }

    public function testSetCleaned(): void
    {
        $builder = $this->getBuilder();
        $builder->setCleaned(22, 3);
        $result = $builder->getResponse();
        $this->assertCount(1, $result->cleaned);
        $this->assertInstanceOf(Coord::class, $result->cleaned[0]);
        $this->assertSame(22, $result->cleaned[0]->X);
        $this->assertSame(3, $result->cleaned[0]->Y);
    }

    public function testSetBatteryLeft(): void
    {
        $builder = $this->getBuilder();
        $value = $this->fake()->numberBetween(1, 9999);
        $builder->setBatteryLeft($value);
        $result = $builder->getResponse();
        $this->assertSame($value, $result->battery);
    }

    public function testSetPosition(): void
    {
        $builder = $this->getBuilder();
        $value = new StartPosition();
        $value->X = $this->fake()->numberBetween(1, 9999);
        $value->Y = $this->fake()->numberBetween(1, 9999);
        $builder->setPosition($value);
        $result = $builder->getResponse();
        $this->assertSame($value, $result->final);
    }

    private function getBuilder(): ResponseBuilder
    {
        $logger = $this->createMock(LoggerInterface::class);
        return new ResponseBuilder($logger);
    }
}

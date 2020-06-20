<?php

namespace Robot\Tests\Components\factories;

use Robot\Components\Factories\DtoFactory;
use Robot\Dto\RobotRequest;
use Robot\Tests\BaseTestCase;

class DtoFactoryTest extends BaseTestCase
{
    public function testMakeRobotRequest(): void
    {
        $factory = new DtoFactory();
        $data = [
            0 => $this->fake()->numberBetween(1, 100),
            1 => $this->fake()->numberBetween(101, 200),
            2 => $this->fake()->numberBetween(201, 300),
        ];
        $result = $factory->makeRobotRequest($data);
        $this->assertInstanceOf(RobotRequest::class, $result);
        $this->assertSame($data[1], $result->source);
        $this->assertSame($data[2], $result->result);
    }
}
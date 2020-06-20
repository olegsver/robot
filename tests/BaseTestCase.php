<?php

namespace Robot\Tests;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

abstract class BaseTestCase extends TestCase
{
    /**
     * @var Generator|null
     */
    private $faker;

    /**
     * Returns faker generator object that can create data for tests.
     *
     * @return Generator
     */
    protected function fake(): ?Generator
    {
        if ($this->faker === null) {
            $this->faker = Factory::create();
        }
        return $this->faker;
    }
}

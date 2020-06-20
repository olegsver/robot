<?php

namespace Robot\Bootstrap;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\Container as ContainerInterface;

class Bootstrap
{
    private $container;

    public function __construct()
    {
        $this->container = Container::getInstance();
    }

    public function init(): void
    {
        (new ContainerInit($this->container))->init();
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}

<?php

namespace Robot\Bootstrap;

use Illuminate\Contracts\Container\Container as ContainerInterface;
use Robot\Components\Validators\RequestValidator;
use Robot\Interfaces\Validate;


/**
 * Class ContainerInit
 */
class ContainerInit
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function init(): void
    {
        $this->container->bind(Validate::class, RequestValidator::class);
        /* $this->container->when(RobotCommand::class)
             ->needs(Validate::class)
             ->give(RequestValidator::class); */
    }


}
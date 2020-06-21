<?php

namespace Robot\Bootstrap;

use Illuminate\Contracts\Container\Container as ContainerInterface;
use Robot\Components\JsonSerializer\JsonSerializer;
use Robot\Components\Loggers\OutputLogger;
use Robot\Components\Validators\RequestValidator;
use Robot\Interfaces\ActionsRunner as ActionsRunnerInterface;
use Robot\Interfaces\LoggerInterface;
use Robot\Interfaces\ResponseEntityManager as ResponseEntityManagerInteface;
use Robot\Interfaces\SourceRepository as SourceRepositoryInterface;
use Robot\Interfaces\Validate;
use Robot\Services\ActionsRunner;
use Robot\Services\ResponseEntityManager;
use Robot\Services\SourceRepository;
use Symfony\Component\Serializer\SerializerInterface;

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
        $this->container->bind(ResponseEntityManagerInteface::class, ResponseEntityManager::class);
        $this->container->bind(LoggerInterface::class, OutputLogger::class);
        $this->container->bind(SerializerInterface::class, JsonSerializer::class);
        $this->container->bind(ActionsRunnerInterface::class, ActionsRunner::class);
        $this->container->bind(Validate::class, RequestValidator::class);
        $this->container->bind(SourceRepositoryInterface::class, SourceRepository::class);
    }
}

<?php

namespace Robot\Bootstrap;

use Illuminate\Contracts\Container\Container as ContainerInterface;
use Robot\Components\JsonSerializer\JsonSerializer;
use Robot\Components\Validators\RequestValidator;
use Robot\Interfaces\SourceRepository as SourceRepositoryInterface;
use Robot\Interfaces\Validate;
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
        $this->container->bind(SerializerInterface::class, JsonSerializer::class);
        $this->container->bind(Validate::class, RequestValidator::class);
        $this->container->bind(SourceRepositoryInterface::class, SourceRepository::class);
    }


}
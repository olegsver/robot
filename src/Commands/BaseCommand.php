<?php

namespace Robot\Commands;

use Exception;
use Illuminate\Contracts\Container\Container as ContainerInterface;
use Robot\Exceptions\ValidationException;
use Robot\Interfaces\LoggerInterface;

abstract class BaseCommand
{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * BaseCommand constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->logger = $this->getContainer()->get(LoggerInterface::class);
    }

    protected function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param array $argvParams
     * @throws \Robot\Exceptions\ValidationException
     */
    abstract protected function runCommand(array $params): void;

    abstract protected function getHelpMessage(): string;

    public function run(array $params): void
    {
        try {
            $this->runCommand($params);
        } catch (ValidationException $exception) {
            $this->errorResponse('Validation error', $exception->getErrorsAsArray());
        } catch (Exception $exception) {
            $this->errorResponse($exception->getMessage(), $exception->getTrace());
        }
    }

    protected function errorResponse(string $text, array $context): void
    {
        $this->getLogger()->log($this->getHelpMessage(), null);
        $this->getLogger()->log("Error: {$text}", $context);
    }
}

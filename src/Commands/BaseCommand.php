<?php

namespace Robot\Commands;

use Exception;
use Illuminate\Contracts\Container\Container as ContainerInterface;
use Robot\Exceptions\ValidationException;

abstract class BaseCommand
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * BaseCommand constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function getContainer(): ContainerInterface
    {
        return $this->container;
    }

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
        echo $this->getHelpMessage(), PHP_EOL;
        echo sprintf('%s Error: %s;', date('Y-m-d H:i:s'), $text), PHP_EOL;
        if (empty($context)) {
            return;
        }
        print_r($context);
    }
}

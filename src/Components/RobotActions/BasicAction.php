<?php

namespace Robot\Components\RobotActions;

use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Dto\Source;

abstract class BasicAction
{
    /** @var ResponseBuilder */
    private $response;
    /** @var Source */
    private $source;

    public function __construct(ResponseBuilder $builder, Source $source)
    {
        $this->response = $builder;
        $this->source = $source;
    }

    public function getResponse(): ResponseBuilder
    {
        return $this->response;
    }

    public function getSource(): Source
    {
        return $this->source;
    }

    abstract protected function getEnergyCost(): int;

    public function isEnoughEnergy(int $energy): bool
    {
        return ($energy >= $this->getEnergyCost());
    }
}

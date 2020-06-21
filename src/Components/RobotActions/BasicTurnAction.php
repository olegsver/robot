<?php

namespace Robot\Components\RobotActions;

use Robot\Dto\Source;

abstract class BasicTurnAction extends BasicAction
{

    public function run(Source $source): Source
    {
        $source->battery -= $this->getEnergyCost();
        $source->start->facing = $this->getNewDirection($source->start->facing);
        return $source;
    }

    abstract protected function getNewDirection(string $directionCode): string;
}

<?php

namespace Robot\Components\RobotActions;

use Robot\Dto\Source;

abstract class BasicMovementAction extends BasicAction
{

    public function run(Source $source): Source
    {
        $source->battery -= $this->getEnergyCost();
        $newX = $this->getNewXCoord($source->start->facing, $source->start->X);
        $newY = $this->getNewYCoord($source->start->facing, $source->start->Y);

        $source->start->X = $newX;
        $source->start->Y = $newY;
        return $source;
    }

    abstract protected function getNewXCoord(string $directionCode, int $x): int;

    abstract protected function getNewYCoord(string $directionCode, int $y): int;
}

<?php

namespace Robot\Components\RobotActions;

use Robot\Enums\SectorStates;

abstract class BasicMovementAction extends BasicAction
{

    public function run(): void
    {
        $this->getSource()->battery -= $this->getEnergyCost();
        $newX = $this->getNewXCoord($this->getSource()->start->facing, $this->getSource()->start->X);
        $newY = $this->getNewYCoord($this->getSource()->start->facing, $this->getSource()->start->Y);

        if ($this->isValidSector($newX, $newY) === true) {
            $this->getSource()->start->X = $newX;
            $this->getSource()->start->Y = $newY;
            $this->getResponse()->setVisited($newX, $newY);
        } else {
            $this->setIsFailed(true);
        }

        $this->getResponse()->setPosition($this->getSource()->start);
        $this->getResponse()->setBatteryLeft($this->getSource()->battery);
    }

    private function isValidSector(int $x, int $y): bool
    {
        if (!isset($this->getSource()->map[$y][$x])) {
            return false;
        }
        $sector = $this->getSource()->map[$y][$x];
        return $sector === SectorStates::STATE_CLEANABLE;
    }

    abstract protected function getNewXCoord(string $directionCode, int $x): int;

    abstract protected function getNewYCoord(string $directionCode, int $y): int;
}

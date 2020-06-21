<?php

namespace Robot\Components\RobotActions;

abstract class BasicTurnAction extends BasicAction
{

    public function run(): void
    {
        $this->getSource()->battery -= $this->getEnergyCost();
        $this->getSource()->start->facing = $this->getNewDirection($this->getSource()->start->facing);
        $this->getResponse()->setPosition($this->getSource()->start);
        $this->getResponse()->setBatteryLeft($this->getSource()->battery);
    }

    abstract protected function getNewDirection(string $directionCode): string;
}

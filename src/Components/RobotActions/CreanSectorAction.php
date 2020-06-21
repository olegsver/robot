<?php

namespace Robot\Components\RobotActions;

use Robot\Interfaces\RobotAction;

class CreanSectorAction extends BasicAction implements RobotAction
{
    private const PRICE = 5;

    protected function getEnergyCost(): int
    {
        return self::PRICE;
    }

    public function run(): void
    {
        $this->getSource()->battery -= $this->getEnergyCost();
        $this->getResponse()->setCleaned(
            $this->getSource()->start->X,
            $this->getSource()->start->Y,
        );
        $this->getResponse()->setPosition($this->getSource()->start);
        $this->getResponse()->setBatteryLeft($this->getSource()->battery);
    }
}

<?php

namespace Robot\Components\RobotActions;

use Robot\Dto\Source;
use Robot\Interfaces\RobotAction;

class CreanSectorAction extends BasicAction implements RobotAction
{
    private const PRICE = 5;

    protected function getEnergyCost(): int
    {
        return self::PRICE;
    }

    public function run(Source $source): Source
    {
        $source->battery -= $this->getEnergyCost();
        return $source;
    }
}

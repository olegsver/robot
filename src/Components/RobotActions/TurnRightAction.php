<?php

namespace Robot\Components\RobotActions;

use Robot\Dto\Source;
use Robot\Interfaces\RobotAction;

class TurnRightAction implements RobotAction
{
    private const PRICE = 1;

    public function run(Source $source): Source
    {
        echo __CLASS__, PHP_EOL;
        return $source;
    }

    public function isEnoughEnergy(int $energy): bool
    {
        return true;
    }
}

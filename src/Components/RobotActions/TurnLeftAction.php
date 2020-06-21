<?php

namespace Robot\Components\RobotActions;

use Robot\Enums\Directions;
use Robot\Exceptions\LogicExcetion;
use Robot\Interfaces\RobotAction;

class TurnLeftAction extends BasicTurnAction implements RobotAction
{
    private const PRICE = 1;

    protected function getEnergyCost(): int
    {
        return self::PRICE;
    }

    protected function getNewDirection(string $directionCode): string
    {
        switch ($directionCode) {
            case Directions::NORTH:
                return Directions::WEST;
                break;
            case Directions::WEST:
                return Directions::SOUTH;
                break;
            case Directions::SOUTH:
                return Directions::EAST;
                break;
            case Directions::EAST:
                return Directions::NORTH;
                break;
        }
        throw new LogicExcetion("Unknown direction: {$directionCode}");
    }
}

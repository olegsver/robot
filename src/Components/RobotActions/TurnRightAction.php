<?php

namespace Robot\Components\RobotActions;

use Robot\Enums\Directions;
use Robot\Exceptions\LogicExcetion;
use Robot\Interfaces\RobotAction;

class TurnRightAction extends BasicTurnAction implements RobotAction
{
    private const PRICE = 1;

    protected function getEnergyCost(): int
    {
        return self::PRICE;
    }

    /**
     * @param string $directionCode
     * @return string
     * @throws \Robot\Exceptions\LogicExcetion
     */
    protected function getNewDirection(string $directionCode): string
    {
        switch ($directionCode) {
            case Directions::NORTH:
                return Directions::EAST;
                break;
            case Directions::WEST:
                return Directions::NORTH;
                break;
            case Directions::SOUTH:
                return Directions::WEST;
                break;
            case Directions::EAST:
                return Directions::SOUTH;
                break;
        }
        throw new LogicExcetion("Unknown direction: {$directionCode}");
    }
}

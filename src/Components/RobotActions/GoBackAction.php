<?php

namespace Robot\Components\RobotActions;

use Robot\Enums\Directions;
use Robot\Exceptions\LogicExcetion;
use Robot\Interfaces\RobotAction;

class GoBackAction extends BasicMovementAction implements RobotAction
{
    private const PRICE = 3;

    protected function getEnergyCost(): int
    {
        return self::PRICE;
    }

    /**
     * @param string $directionCode
     * @param int $x
     * @return int
     * @throws \Robot\Exceptions\LogicExcetion
     */
    protected function getNewXCoord(string $directionCode, int $x): int
    {
        switch ($directionCode) {
            case Directions::NORTH:
                return $x;
                break;
            case Directions::WEST:
                return $x + 1;
                break;
            case Directions::SOUTH:
                return $x;
                break;
            case Directions::EAST:
                return $x - 1;
                break;
        }
        throw new LogicExcetion("Unknown direction: {$directionCode}");
    }

    /**
     * @param string $directionCode
     * @param int $y
     * @return int
     * @throws \Robot\Exceptions\LogicExcetion
     */
    protected function getNewYCoord(string $directionCode, int $y): int
    {
        switch ($directionCode) {
            case Directions::NORTH:
                return $y + 1;
                break;
            case Directions::WEST:
                return $y;
                break;
            case Directions::SOUTH:
                return $y - 1;
                break;
            case Directions::EAST:
                return $y;
                break;
        }
        throw new LogicExcetion("Unknown direction: {$directionCode}");
    }
}

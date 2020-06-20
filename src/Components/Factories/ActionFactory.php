<?php

namespace Robot\Components\Factories;

use Robot\Components\RobotActions\CreanSectorAction;
use Robot\Components\RobotActions\GoBackAction;
use Robot\Components\RobotActions\GoFrontAction;
use Robot\Components\RobotActions\TurnLeftAction;
use Robot\Components\RobotActions\TurnRightAction;
use Robot\Enums\Actions;
use Robot\Exceptions\LogicExcetion;
use Robot\Interfaces\RobotAction;

class ActionFactory
{
    public function makeTurnLeftAction(): RobotAction
    {
        return new TurnLeftAction();
    }

    public function makeTurnRightAction(): RobotAction
    {
        return new TurnRightAction();
    }

    public function makeGoFrontAction(): RobotAction
    {
        return new GoFrontAction();
    }

    public function makeGoBackAction(): RobotAction
    {
        return new GoBackAction();
    }

    public function makeCreanSectorAction(): RobotAction
    {
        return new CreanSectorAction();
    }

    public function makeActionByActionCode(string $actionCode): RobotAction
    {
        switch ($actionCode) {
            case Actions::TURN_LEFT:
                return $this->makeTurnLeftAction();
                break;
            case Actions::TURN_RIGHT:
                return $this->makeTurnRightAction();
                break;
            case Actions::ADVANCE:
                return $this->makeGoFrontAction();
                break;
            case Actions::BACK:
                return $this->makeGoBackAction();
                break;
            case Actions::CLEAN:
                return $this->makeCreanSectorAction();
                break;
            default:
                throw new LogicExcetion("Unknown command: {$actionCode}");
        }
    }
}

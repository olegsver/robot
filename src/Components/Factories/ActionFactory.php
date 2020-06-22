<?php

namespace Robot\Components\Factories;

use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Components\RobotActions\CleanSectorAction;
use Robot\Components\RobotActions\CreanSectorAction;
use Robot\Components\RobotActions\GoBackAction;
use Robot\Components\RobotActions\GoFrontAction;
use Robot\Components\RobotActions\TurnLeftAction;
use Robot\Components\RobotActions\TurnRightAction;
use Robot\Dto\Source;
use Robot\Enums\Actions;
use Robot\Exceptions\LogicExcetion;
use Robot\Interfaces\RobotAction;

class ActionFactory
{
    private function makeTurnLeftAction(ResponseBuilder $builder, Source $source): RobotAction
    {
        return new TurnLeftAction($builder, $source);
    }

    private function makeTurnRightAction(ResponseBuilder $builder, Source $source): RobotAction
    {
        return new TurnRightAction($builder, $source);
    }

    private function makeGoFrontAction(ResponseBuilder $builder, Source $source): RobotAction
    {
        return new GoFrontAction($builder, $source);
    }

    private function makeGoBackAction(ResponseBuilder $builder, Source $source): RobotAction
    {
        return new GoBackAction($builder, $source);
    }

    private function makeCreanSectorAction(ResponseBuilder $builder, Source $source): RobotAction
    {
        return new CleanSectorAction($builder, $source);
    }

    public function makeActionByActionCode(string $actionCode, ResponseBuilder $builder, Source $source): RobotAction
    {
        switch ($actionCode) {
            case Actions::TURN_LEFT:
                return $this->makeTurnLeftAction($builder, $source);
                break;
            case Actions::TURN_RIGHT:
                return $this->makeTurnRightAction($builder, $source);
                break;
            case Actions::ADVANCE:
                return $this->makeGoFrontAction($builder, $source);
                break;
            case Actions::BACK:
                return $this->makeGoBackAction($builder, $source);
                break;
            case Actions::CLEAN:
                return $this->makeCreanSectorAction($builder, $source);
                break;
            default:
                throw new LogicExcetion("Unknown command: {$actionCode}");
        }
    }
}

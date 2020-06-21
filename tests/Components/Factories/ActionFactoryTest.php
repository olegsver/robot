<?php

namespace Robot\Tests\Components\Factories;

use Robot\Components\Factories\ActionFactory;
use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Components\RobotActions\CreanSectorAction;
use Robot\Components\RobotActions\GoBackAction;
use Robot\Components\RobotActions\GoFrontAction;
use Robot\Components\RobotActions\TurnLeftAction;
use Robot\Components\RobotActions\TurnRightAction;
use Robot\Dto\Source;
use Robot\Enums\Actions;
use Robot\Tests\BaseTestCase;

class ActionFactoryTest extends BaseTestCase
{
    public function testMakeActionByActionCode()
    {
        $factory = new ActionFactory();
        $response = $this->createMock(ResponseBuilder::class);
        $source = $this->createMock(Source::class);
        $validMap = [
            Actions::TURN_LEFT => TurnLeftAction::class,
            Actions::TURN_RIGHT => TurnRightAction::class,
            Actions::ADVANCE => GoFrontAction::class,
            Actions::BACK => GoBackAction::class,
            Actions::CLEAN => CreanSectorAction::class,
        ];
        foreach ($validMap as $action => $class) {
            $result = $factory->makeActionByActionCode($action, $response, $source);
            $this->assertInstanceOf($class, $result);
            $this->assertSame($response, $result->getResponse());
            $this->assertSame($source, $result->getSource());
        }
    }
}

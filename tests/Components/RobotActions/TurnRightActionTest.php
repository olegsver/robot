<?php

namespace Robot\Tests\Components\RobotActions;

use Robot\Components\RobotActions\TurnRightAction;
use Robot\Enums\Directions;

class TurnRightActionTest extends BasicActionCase
{
    public function testRun(): void
    {
        $action = new TurnRightAction($this->getBuilder(), $this->getSource());
        $action->run();
        $result = $action->getResponse();

        $this->assertSame(19, $result->getResponse()->battery);
        $this->assertEmpty($result->getResponse()->visited);
        $this->assertEmpty($result->getResponse()->cleaned);

        $this->assertSame(Directions::EAST, $result->getResponse()->final->facing);
    }
}

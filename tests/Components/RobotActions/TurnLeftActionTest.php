<?php

namespace Robot\Tests\Components\RobotActions;

use Robot\Components\RobotActions\TurnLeftAction;
use Robot\Enums\Directions;

class TurnLeftActionTest extends BasicActionCase
{
    public function testRun(): void
    {
        $action = new TurnLeftAction($this->getBuilder(), $this->getSource());
        $action->run();
        $result = $action->getResponse();

        $this->assertSame(19, $result->getResponse()->battery);
        $this->assertEmpty($result->getResponse()->visited);
        $this->assertEmpty($result->getResponse()->cleaned);

        $this->assertSame(Directions::WEST, $result->getResponse()->final->facing);
    }
}

<?php

namespace Robot\Tests\Components\RobotActions;

use Robot\Components\RobotActions\GoBackAction;

class GoBackActionTest extends BasicActionCase
{
    public function testRun(): void
    {
        $action = new GoBackAction($this->getBuilder(), $this->getSource());
        $action->run();
        $result = $action->getResponse();

        $this->assertSame(17, $result->getResponse()->battery);
        $this->assertEmpty($result->getResponse()->cleaned);
        $this->assertCount(1, $result->getResponse()->visited);

        $sector = $result->getResponse()->visited[0];
        $this->assertSame(0, $sector->X);
        $this->assertSame(1, $sector->Y);
    }
}

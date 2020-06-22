<?php

namespace Robot\Tests\Components\RobotActions;

use Robot\Components\RobotActions\CleanSectorAction;

class CleanSectorActionTest extends BasicActionCase
{
    public function testRun(): void
    {
        $action = new CleanSectorAction($this->getBuilder(), $this->getSource());
        $action->run();
        $result = $action->getResponse();

        $this->assertSame(15, $result->getResponse()->battery);
        $this->assertEmpty($result->getResponse()->visited);
        $this->assertCount(1, $result->getResponse()->cleaned);

        $sector = $result->getResponse()->cleaned[0];
        $this->assertSame(0, $sector->X);
        $this->assertSame(0, $sector->Y);
    }
}

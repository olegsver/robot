<?php

namespace Robot\Tests\Components\RobotActions;

use Robot\Components\RobotActions\GoFrontAction;
use Robot\Dto\Source;
use Robot\Enums\Directions;

class GoFrontActionTest extends BasicActionCase
{
    public function testRun(): void
    {
        $action = new GoFrontAction($this->getBuilder(), $this->getSource());
        $action->run();
        $result = $action->getResponse();

        $this->assertSame(18, $result->getResponse()->battery);
        $this->assertEmpty($result->getResponse()->cleaned);
        $this->assertCount(1, $result->getResponse()->visited);

        $sector = $result->getResponse()->visited[0];
        $this->assertSame(0, $sector->X);
        $this->assertSame(1, $sector->Y);
    }

    public function getSource(): Source
    {
        $source = parent::getSource();
        $source->start->facing = Directions::SOUTH;
        return $source;
    }
}

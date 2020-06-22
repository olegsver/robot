<?php

namespace Robot\Tests\Components\RobotActions;

use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Dto\Source;
use Robot\Dto\StartPosition;
use Robot\Enums\Directions;
use Robot\Enums\SectorStates;
use Robot\Interfaces\LoggerInterface;
use Robot\Tests\BaseTestCase;

class BasicActionCase extends BaseTestCase
{

    protected function getBuilder(): ResponseBuilder
    {
        $logger = $this->createMock(LoggerInterface::class);
        return new ResponseBuilder($logger);
    }

    protected function getSource(): Source
    {
        $source = new Source();
        $source->map[0][0] = SectorStates::STATE_CLEANABLE;
        $source->map[0][1] = SectorStates::STATE_CLEANABLE;
        $source->map[1][0] = SectorStates::STATE_CLEANABLE;
        $source->map[1][1] = SectorStates::STATE_CLEANABLE;
        $source->start = new StartPosition();
        $source->start->X = 0;
        $source->start->Y = 0;
        $source->start->facing = Directions::NORTH;
        $source->battery = 20;
        return $source;
    }
}

<?php

namespace Robot\Components\Strategies;

use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Dto\Source;
use Robot\Interfaces\Strategy;
use Robot\Enums\Actions;

class BackOffStrategy implements Strategy
{
    public function getStrategy(): array
    {
        return [
            [Actions::TURN_RIGHT, Actions::ADVANCE, Actions::TURN_LEFT],
            [Actions::TURN_RIGHT, Actions::ADVANCE, Actions::TURN_RIGHT],
            [Actions::TURN_RIGHT, Actions::ADVANCE, Actions::TURN_RIGHT],
            [Actions::TURN_RIGHT, Actions::BACK, Actions::TURN_RIGHT, Actions::ADVANCE],
            [Actions::TURN_LEFT, Actions::TURN_LEFT, Actions::ADVANCE],
        ];
    }
}

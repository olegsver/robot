<?php

namespace Robot\Components\RobotActions;

use Robot\Dto\Source;
use Robot\Interfaces\RobotAction;

class GoFrontAction implements RobotAction
{

    public function run(Source $source): Source
    {
        echo __CLASS__, PHP_EOL;
        return $source;
    }
}

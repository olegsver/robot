<?php

namespace Robot\Interfaces;

use Robot\Dto\Source;

/**
 * Interface RobotAction
 */
interface RobotAction
{
    public function run(Source $source): Source;

    public function isEnoughEnergy(int $energy): bool;
}

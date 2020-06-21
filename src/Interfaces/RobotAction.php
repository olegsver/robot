<?php

namespace Robot\Interfaces;

use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Dto\Source;

/**
 * Interface RobotAction
 */
interface RobotAction
{
    public function run(): void;

    public function getSource(): Source;

    public function getResponse(): ResponseBuilder;

    public function isEnoughEnergy(int $energy): bool;
	
	public function getIsFailed(): bool;
}

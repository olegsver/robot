<?php


namespace Robot\Interfaces;

use Robot\Dto\RobotRequest;
use Robot\Dto\Source;

/**
 * Interface SourceRepository
 */
interface SourceRepository
{
    public function findByRequest(RobotRequest $request): Source;
}

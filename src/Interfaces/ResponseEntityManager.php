<?php

namespace Robot\Interfaces;

use Robot\Dto\Response;
use Robot\Dto\RobotRequest;

/**
 * Interface ActionsRunner
 */
interface ResponseEntityManager
{
    public function save(RobotRequest $request, Response $response): void;
}

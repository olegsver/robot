<?php

namespace Robot\Components\Factories;

use Robot\Dto\RobotRequest;

class DtoFactory
{
    public function makeRobotRequest(array $argv): RobotRequest
    {
        $request = new RobotRequest();
        $request->source = $argv[1] ?? null;
        $request->result = $argv[2] ?? null;
        return $request;
    }
}
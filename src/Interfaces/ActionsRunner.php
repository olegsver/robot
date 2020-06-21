<?php

namespace Robot\Interfaces;

use Robot\Dto\Response;
use Robot\Dto\Source;

/**
 * Interface ActionsRunner
 */
interface ActionsRunner
{
    public function runActions(Source $source): Response;
}

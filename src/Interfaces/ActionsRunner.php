<?php

namespace Robot\Interfaces;

use Robot\Dto\Source;

/**
 * Interface ActionsRunner
 */
interface ActionsRunner
{
    public function runActions(Source $source): Source;
}

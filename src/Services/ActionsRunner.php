<?php

namespace Robot\Services;

use Robot\Components\Factories\ActionFactory;
use Robot\Dto\Source;
use Robot\Interfaces\ActionsRunner as ActionsRunnerInterface;

class ActionsRunner implements ActionsRunnerInterface
{
    private $factory;

    public function __construct(ActionFactory $factory)
    {
        $this->factory = $factory;
    }

    public function runActions(Source $source): Source
    {
        $workingData = clone $source;
        foreach ($source->commands as $actionCode) {
            $action = $this->factory->makeActionByActionCode($actionCode);
            // apply action to copy of source
            $workingData = $action->run($workingData);
        }
        return $workingData;
    }
}

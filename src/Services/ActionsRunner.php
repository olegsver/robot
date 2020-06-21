<?php

namespace Robot\Services;

use Robot\Components\Factories\ActionFactory;
use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Dto\Response;
use Robot\Dto\Source;
use Robot\Interfaces\ActionsRunner as ActionsRunnerInterface;

class ActionsRunner implements ActionsRunnerInterface
{
    /** @var ActionFactory */
    private $factory;
    /** @var ResponseBuilder */
    private $builder;

    public function __construct(ActionFactory $factory, ResponseBuilder $builder)
    {
        $this->factory = $factory;
        $this->builder = $builder;
    }

    public function runActions(Source $source): Response
    {
        $workingData = clone $source;
        $this->builder->setVisited($workingData->start->X, $workingData->start->Y);
        foreach ($source->commands as $actionCode) {
            $action = $this->factory->makeActionByActionCode($actionCode, $this->builder, $workingData);
            if ($action->isEnoughEnergy($workingData->battery) === false) {
                break;
            }
            $action->run();
        }
        return $this->builder->getResponse();
    }
}

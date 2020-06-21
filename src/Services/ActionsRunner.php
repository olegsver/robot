<?php

namespace Robot\Services;

use Robot\Components\Factories\ActionFactory;
use Robot\Components\ResponseBuilder\ResponseBuilder;
use Robot\Dto\Response;
use Robot\Dto\Source;
use Robot\Interfaces\ActionsRunner as ActionsRunnerInterface;
use Robot\Interfaces\Strategy;
use Robot\Interfaces\LoggerInterface;
use Robot\Interfaces\RobotAction;

class ActionsRunner implements ActionsRunnerInterface
{
    /** @var ActionFactory */
    private $factory;
    /** @var ResponseBuilder */
    private $builder;
	/** @var Strategy */
	private $strategy;
	/** @var LoggerInterface */
	private $logger;
	
	private $source;

    public function __construct(ActionFactory $factory, ResponseBuilder $builder, Strategy $strategy, LoggerInterface $logger)
    {
        $this->factory = $factory;
        $this->builder = $builder;
		$this->strategy = $strategy;
		$this->logger = $logger;
    }

    public function runActions(Source $source): Response
    {
        $this->source = clone $source;
        $this->builder->setVisited($this->source->start->X, $this->source->start->Y);
        foreach ($source->commands as $actionCode) {
            $action = $this->getAction($actionCode);
            if ($action->isEnoughEnergy($this->source->battery) === false) {
                break;
            }
            $action->run();
			if ($action->getIsFailed() === true){
				$this->logger->log("-- Action failed --", null);
				if ($this->runBackOffStategy() === false){
					break;
				}
				$this->logger->log("-- returns to main sequance --", null);
			}
        }
        return $this->builder->getResponse();
    }
	
	private function runBackOffStategy(): bool
	{
		$this->logger->log("Starting back off strategy", null);
		foreach($this->strategy->getStrategy() as $actionsPack){
			$success = $this->runBackOffStategyActions($actionsPack);
			if ($success === true){
				$this->logger->log("Strategy completed successfull", null);
				return true;
			}
		}
		return false;
	}
	
	private function runBackOffStategyActions(array $actionsPack): bool
	{
		$this->logger->log("strategy found:", $actionsPack);
		foreach($actionsPack as $actionCode){
			$action = $this->getAction($actionCode);
            if ($action->isEnoughEnergy($this->source->battery) === false) {
                return true;
            }
			$action->run();
			if ($action->getIsFailed() === true){#
				$this->logger->log("strategy failed", null);
				return false;
			}
		}
		return true;
	}
	
	private function getAction(string $actionCode): RobotAction
	{
		return $this->factory->makeActionByActionCode($actionCode, $this->builder, $this->source);
	}
}

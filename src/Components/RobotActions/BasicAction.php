<?php

namespace Robot\Components\RobotActions;

abstract class BasicAction
{
    abstract protected function getEnergyCost(): int;

    public function isEnoughEnergy(int $energy): bool
    {
        return ($energy >= $this->getEnergyCost());
    }
}

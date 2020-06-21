<?php

namespace Robot\Interfaces;

interface LoggerInterface
{
    /**
     * @param string $message
     * @param mixed $context
     */
    public function log(string $message, $context): void;
}

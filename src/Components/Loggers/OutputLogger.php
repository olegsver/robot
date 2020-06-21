<?php

namespace Robot\Components\Loggers;

use Robot\Interfaces\LoggerInterface;

class OutputLogger implements LoggerInterface
{
    public function log(string $message, $context): void
    {
        echo date('Y-m-d H:i:s'), ' ', $message, PHP_EOL;
        if (empty($context)) {
            return;
        }
        print_r($context);
        echo PHP_EOL;
    }
}

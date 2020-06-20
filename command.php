<?php

require_once __DIR__ . '/vendor/autoload.php';

use Robot\Bootstrap\Bootstrap;
use Robot\Commands\RobotCommand;

$bootstrap = new Bootstrap();
$bootstrap->init();

$command = new RobotCommand($bootstrap->getContainer());
$command->run($argv);
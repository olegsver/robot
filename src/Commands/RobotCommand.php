<?php

namespace Robot\Commands;

use Robot\Components\Factories\DtoFactory;
use Robot\Interfaces\Validate;

class RobotCommand extends BaseCommand
{
    protected function getHelpMessage(): string
    {
        return 'usage: php command.php source result';
    }

    protected function runCommand(array $argvParams): void
    {
        /**
 * @var DtoFactory $requestFactory 
*/
        $requestFactory = $this->getContainer()->make(DtoFactory::class);
        $request = $requestFactory->makeRobotRequest($argvParams);
        /**
 * @var Validate $validator 
*/
        $validator = $this->getContainer()->get(Validate::class);
        $validator->validateOrFail(
            [
                'source' => $request->source,
                'result' => $request->result,
            ]
        );
    }
}
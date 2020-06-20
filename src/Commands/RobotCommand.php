<?php

namespace Robot\Commands;

use Robot\Components\Factories\DtoFactory;
use Robot\Components\Validators\SourceValidator;
use Robot\Interfaces\ActionsRunner;
use Robot\Interfaces\SourceRepository;
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
        $requestFactory = $this->getContainer()->get(DtoFactory::class);
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
        /**
         * @var SourceRepository $service
         */
        $service = $this->getContainer()->get(SourceRepository::class);
        $source = $service->findByRequest($request);

        /**
         * @var SourceValidator $validator
         */
        $validator = $this->getContainer()->get(SourceValidator::class);
        $validator->validateOrFail(['source data' => $source]);
        /** @var ActionsRunner $service */
        $service = $this->getContainer()->get(ActionsRunner::class);
        $result = $service->runActions($source);
        var_dump($result);
    }
}

<?php

namespace Robot\Commands;

use Robot\Components\Factories\DtoFactory;
use Robot\Components\Validators\SourceValidator;
use Robot\Dto\RobotRequest;
use Robot\Dto\Source;
use Robot\Interfaces\ActionsRunner;
use Robot\Interfaces\ResponseEntityManager;
use Robot\Interfaces\SourceRepository;
use Robot\Interfaces\Validate;

class RobotCommand extends BaseCommand
{
    protected function getHelpMessage(): string
    {
        return 'usage: php command.php source result';
    }

    /**
     * @param array $argvParams
     * @throws \Robot\Exceptions\ValidationException
     */
    protected function runCommand(array $argvParams): void
    {
        $request = $this->getValidatedRequest($argvParams);
        $source = $this->getValidatedSource($request);
        /** @var ActionsRunner $service */
        $service = $this->getContainer()->get(ActionsRunner::class);
        $response = $service->runActions($source);
        /** @var ResponseEntityManager $responseManager */
        $responseManager = $this->getContainer()->get(ResponseEntityManager::class);
        $responseManager->save($request, $response);
    }

    /**
     * @param array $argvParams
     * @return \Robot\Dto\RobotRequest
     * @throws \Robot\Exceptions\ValidationException
     */
    private function getValidatedRequest(array $argvParams): RobotRequest
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
        return $request;
    }

    /**
     * @param \Robot\Dto\RobotRequest $request
     * @return \Robot\Dto\Source
     * @throws \Robot\Exceptions\ValidationException
     */
    private function getValidatedSource(RobotRequest $request): Source
    {
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
        return $source;
    }
}

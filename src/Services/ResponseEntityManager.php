<?php

namespace Robot\Services;

use Robot\Components\Helpers\FileHelper;
use Robot\Dto\Response;
use Robot\Dto\RobotRequest;
use Robot\Enums\SerializeTypes;
use Robot\Interfaces\ResponseEntityManager as ResponseEntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ResponseEntityManager implements ResponseEntityManagerInterface
{
    /**
     * @var FileHelper
     */
    private $fileHelper;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(FileHelper $fileHelper, SerializerInterface $serializer)
    {
        $this->fileHelper = $fileHelper;
        $this->serializer = $serializer;
    }

    /**
     * @param \Robot\Dto\RobotRequest $request
     * @param \Robot\Dto\Response $response
     */
    public function save(RobotRequest $request, Response $response): void
    {
        $json = $this->serializer->serialize(
            $response,
            SerializeTypes::TYPE_JSON,
            ['json_encode_options' => JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR]
        );
        $this->fileHelper->saveFileSourceOrFail($request->result, $json);
    }
}

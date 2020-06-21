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

    public function save(RobotRequest $request, Response $response): void
    {
		//$response = new Response($serializer->serialize($data, JsonEncoder::FORMAT, [JsonEncode::OPTIONS => JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT]))
        $json = $this->serializer->serialize($response, SerializeTypes::TYPE_JSON);
        $this->fileHelper->saveFileSourceOrFail($request->result, $json);
    }
}

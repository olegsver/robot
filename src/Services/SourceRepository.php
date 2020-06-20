<?php

namespace Robot\Services;

use Robot\Components\Helpers\FileHelper;
use Robot\Dto\RobotRequest;
use Robot\Dto\Source;
use Robot\Enums\SerializeTypes;
use Robot\Exceptions\WrongFileException;
use Robot\Interfaces\SourceRepository as SourceRepositoryInterface;
use Symfony\Component\Serializer\SerializerInterface;

class SourceRepository implements SourceRepositoryInterface
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
     * @param  RobotRequest $request
     * @return Source
     * @throws WrongFileException
     */
    public function findByRequest(RobotRequest $request): Source
    {
        $source = $this->fileHelper->getFileSourceOrFail($request->source);
        if (empty($source)) {
            throw new WrongFileException("Source file is empty");
        }
        /**
 * @var Source $dto 
*/
        $dto = $this->serializer->deserialize($source, Source::class, SerializeTypes::TYPE_JSON);
        if (!$dto instanceof Source) {
            throw new WrongFileException("Source file has wrong structure");
        }
        return $dto;
    }

}
<?php

namespace Robot\Tests\Services;


use Robot\Components\Helpers\FileHelper;
use Robot\Dto\RobotRequest;
use Robot\Dto\Source;
use Robot\Services\SourceRepository;
use Robot\Tests\BaseTestCase;
use Symfony\Component\Serializer\SerializerInterface;

class SourceRepositoryTest extends BaseTestCase
{
    public function testFindByRequest(): void
    {
        $service = $this->getService();
        $request = new RobotRequest();
        $request->source = 'tests/data/test1.json';
        $result = $service->findByRequest($request);
        $this->assertEquals(new Source(), $result);
    }


    private function getService(): SourceRepository
    {
        $fileHelper = $this->createMock(FileHelper::class);
        $fileHelper->expects($this->once())->method('getFileSourceOrFail')->willReturn('{}');

        $serializer = $this->createMock(SerializerInterface::class);
        $serializer->expects($this->once())->method('deserialize')->willReturn(new Source());
        return new SourceRepository($fileHelper, $serializer);
    }
}
<?php

namespace Robot\Tests\Components\JsonSerializer;

use Robot\Components\JsonSerializer\JsonSerializer;
use Robot\Dto\Source;
use Robot\Dto\StartPosition;
use Robot\Enums\SerializeTypes;
use Robot\Tests\BaseTestCase;

class JsonSerializerTest extends BaseTestCase
{
    public function testDeserialize()
    {
        $serializer = new JsonSerializer();
        $result = $serializer->deserialize($this->getJson(), Source::class, SerializeTypes::TYPE_JSON);
        $this->assertInstanceOf(Source::class, $result);
        $this->assertEquals($this->getMap(), $result->map);
        $this->assertEquals($this->getStart(), $result->start);
        $this->assertEquals($this->getCommands(), $result->commands);
        $this->assertEquals(80, $result->battery);
    }

    private function getJson(): string
    {
        return file_get_contents(__DIR__ . '../../../Data/test1.json');
    }

    private function getMap(): array
    {
        return [
            ['S', 'S', 'S', 'S'],
            ['S', 'S', 'C', 'S'],
            ['S', 'S', 'S', 'S'],
            ['S', 'null', 'S', 'S'],
        ];
    }

    private function getStart(): StartPosition
    {
        $position = new StartPosition();
        $position->X = 3;
        $position->Y = 0;
        $position->facing = 'N';
        return $position;
    }

    private function getCommands(): array
    {
        return ["TL", "A", "C", "A", "C", "TR", "A", "C"];
    }
}

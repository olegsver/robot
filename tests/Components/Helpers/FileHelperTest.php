<?php

namespace Robot\Tests\Components\Helpers;

use Robot\Components\Helpers\FileHelper;
use Robot\Exceptions\WrongFileException;
use Robot\Tests\BaseTestCase;

class FileHelperTest extends BaseTestCase
{
    public function testGetFileSourceOrFail(): void
    {
        $component = new FileHelper();
        $result = $component->getFileSourceOrFail('tests/Data/empty.json');
        $this->assertSame('{}', $result);
    }

    public function testGetFileSourceOrFailNegative(): void
    {
        $this->expectException(WrongFileException::class);
        $component = new FileHelper();
        $component->getFileSourceOrFail('not existing file');
    }
}
<?php

namespace Robot\Tests\Components\Factories;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Robot\Components\Factories\FileLoaderFactory;
use Robot\Components\LanguageDir\LanguageDir;
use Robot\Tests\BaseTestCase;


/**
 * Class FileLoaderFactoryTest
 */
class FileLoaderFactoryTest extends BaseTestCase
{
    public function testCreate(): void
    {
        $fileSystem = $this->getMockBuilder(Filesystem::class)->disableOriginalConstructor()->getMock();
        $component = new FileLoaderFactory($fileSystem);
        $language = $this->getMockBuilder(LanguageDir::class)->getMock();
        $this->assertInstanceOf(FileLoader::class, $component->create($language, 'en'));
    }
}

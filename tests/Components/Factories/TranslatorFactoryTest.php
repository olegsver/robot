<?php

namespace Robot\Tests\Components\Factories;

use Illuminate\Translation\Translator;
use Robot\Components\Factories\FileLoaderFactory;
use Robot\Components\Factories\TranslatorFactory;
use Robot\Components\LanguageDir\LanguageDir;
use Robot\Tests\BaseTestCase;

/**
 * Class FileLoaderFactory
 */
class TranslatorFactoryTest extends BaseTestCase
{
    public function testCreate(): void
    {
        $language = $this->getMockBuilder(LanguageDir::class)->getMock();
        $factory = $this->getMockBuilder(FileLoaderFactory::class)->disableOriginalConstructor()->getMock();
        $component = new TranslatorFactory($language, $factory);
        $this->assertInstanceOf(Translator::class, $component->create('en'));
    }
}

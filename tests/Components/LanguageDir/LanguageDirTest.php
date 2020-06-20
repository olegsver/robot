<?php

namespace Robot\Tests\Components\LanguageDir;

use Robot\Components\LanguageDir\LanguageDir;
use Robot\Tests\BaseTestCase;


/**
 * Class LanguageDirTest
 */
class LanguageDirTest extends BaseTestCase
{
    public function testGetLangDir(): void
    {
        $component = new LanguageDir();
        $this->assertNotEmpty($component->getLangDir());
        $this->assertIsString($component->getLangDir());
    }
}

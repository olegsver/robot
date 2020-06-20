<?php

namespace Robot\Components\Factories;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Robot\Components\LanguageDir\LanguageDir;

/**
 * Class FileLoaderFactory
 */
class FileLoaderFactory
{
    /**
     * @var Filesystem
     */
    private $fileSystem;

    /**
     * FileLoaderFactory constructor.
     *
     * @param Filesystem $fileSystem
     */
    public function __construct(Filesystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    public function create(LanguageDir $languageDir, string $language): FileLoader
    {
        $loader = new FileLoader($this->fileSystem, $languageDir->getLangDir());
        $loader->addNamespace('lang', $languageDir->getLangDir());
        $loader->load($language, 'validation', 'lang');
        return $loader;
    }
}

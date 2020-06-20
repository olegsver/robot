<?php

namespace Robot\Components\Factories;

use Illuminate\Translation\Translator;
use Robot\Components\LanguageDir\LanguageDir;

/**
 * Class TranslatorFactory
 */
class TranslatorFactory
{
    /**
     * @var LanguageDir
     */
    private $languageDir;
    /**
     * @var FileLoaderFactory
     */
    private $fileLoaderFactory;

    /**
     * TranslatorFactory constructor.
     *
     * @param LanguageDir       $languageDir
     * @param FileLoaderFactory $fileLoaderFactory
     */
    public function __construct(LanguageDir $languageDir, FileLoaderFactory $fileLoaderFactory)
    {
        $this->languageDir = $languageDir;
        $this->fileLoaderFactory = $fileLoaderFactory;
    }

    /**
     * @param string $language
     *
     * @return Translator
     */
    public function create(string $language): Translator
    {
        return new Translator(
            $this->fileLoaderFactory->create($this->languageDir, $language),
            $language
        );
    }
}

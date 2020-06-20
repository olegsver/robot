<?php

namespace Robot\Components\LanguageDir;

/**
 * Class LanguageDir
 */
class LanguageDir
{
    /**
     * standart Eloquent validation expects lang dir
     * it could do not exists
     * add lang dir, when you will need add multy-language
     *
     * @return string
     */
    public function getLangDir(): string
    {
        return dirname(dirname(__FILE__)) . '/lang';
    }
}

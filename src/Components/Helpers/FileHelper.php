<?php

namespace Robot\Components\Helpers;

use Robot\Exceptions\WrongFileException;

class FileHelper
{
    /**
     * @param  string $fileName
     * @return string
     * @throws WrongFileException
     */
    public function getFileSourceOrFail(string $fileName): string
    {
        if (!is_readable($fileName)) {
            throw new WrongFileException("{$fileName} is not readable");
        }
        $result = file_get_contents($fileName);
        if ($result === false) {
            throw new WrongFileException("can not read file {$fileName}");
        }
        return $result;
    }
}
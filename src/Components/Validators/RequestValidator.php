<?php

namespace Robot\Components\Validators;

use Robot\Components\ValidationRules\JsonFile;
use Robot\Components\ValidationRules\ReadableFile;
use Robot\Components\ValidationRules\WriteableDir;

class RequestValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'source' => ['required', 'string', new JsonFile(), new ReadableFile()],
            'result' => ['required', 'string', new JsonFile(), new WriteableDir()],
        ];
    }
}
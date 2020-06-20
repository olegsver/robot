<?php

namespace Robot\Components\Validators;

use Robot\Components\ValidationRules\CorrectMap;
use Robot\Components\ValidationRules\CorrectStartPosition;

class SourceValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'source data' => ['required', new CorrectMap(), new CorrectStartPosition()],
        ];
    }
}
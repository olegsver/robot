<?php

namespace Robot\Components\Validators;

use Robot\Components\ValidationRules\CorrectMap;

class SourceValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'source data' => ['required', new CorrectMap()],
        ];
    }
}
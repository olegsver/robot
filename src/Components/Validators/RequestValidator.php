<?php

namespace Robot\Components\Validators;

class RequestValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'source' => 'required|string',
            'result' => 'required|string',
        ];
    }
}
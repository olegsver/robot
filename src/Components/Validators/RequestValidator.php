<?php

namespace Robot\Components\Validators;

class RequestValidator extends BaseValidator
{
    public function rules(): array
    {
        return [
            'source' => 'required|string',
            'result' => 'required|string',
        ];
    }
}
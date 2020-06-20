<?php

namespace Robot\Components\ValidationRules;

use Illuminate\Contracts\Validation\Rule;

class ReadableFile implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return is_readable($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return ':attribute is not readable file';
    }
}

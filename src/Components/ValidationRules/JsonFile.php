<?php

namespace Robot\Components\ValidationRules;

use Illuminate\Contracts\Validation\Rule;

class JsonFile implements Rule
{
    private const VALID_TYPES = ['json'];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $extension = pathinfo($value, PATHINFO_EXTENSION);
        return in_array(strtolower($extension), self::VALID_TYPES);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return ':attribute must be json file';
    }
}
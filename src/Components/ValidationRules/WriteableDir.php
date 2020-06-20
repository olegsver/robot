<?php

namespace Robot\Components\ValidationRules;

use Illuminate\Contracts\Validation\Rule;

class WriteableDir implements Rule
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
        $dir = pathinfo($value, PATHINFO_DIRNAME);
        return is_writable($dir);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return ':attribute dir is not writeable';
    }
}
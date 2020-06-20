<?php

namespace Robot\Components\ValidationRules;

use Illuminate\Contracts\Validation\Rule;
use Robot\Dto\Source;
use Robot\Enums\Actions;

class CorrectCommands implements Rule
{
    private $lastError = ':attribute contains incorrect commands';

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (!$value instanceof Source) {
            return false;
        }
        if (!is_array($value->commands)) {
            return false;
        }
        $incorrectCommands = array_diff($value->commands, Actions::getAll());
        if (!empty($incorrectCommands)) {
            return false;
        }
        return true;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->lastError;
    }
}

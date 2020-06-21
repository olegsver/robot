<?php

namespace Robot\Components\ValidationRules;

use Illuminate\Contracts\Validation\Rule;
use Robot\Dto\Source;
use Robot\Dto\StartPosition;
use Robot\Enums\Directions;
use Robot\Enums\SectorStates;

class CorrectStartPosition implements Rule
{
    private $lastError = ':attribute contains incorrect start position';

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
        if (!$value->start instanceof StartPosition) {
            return false;
        }
        if (!isset($value->map[$value->start->X][$value->start->Y])) {
            return false;
        }
        $sector = $value->map[$value->start->X][$value->start->Y];
        if ($sector !== SectorStates::STATE_CLEANABLE) {
            $this->lastError = 'Wrong start position sector';
            return false;
        }
        if (!in_array($value->start->facing, Directions::getAll())) {
            $this->lastError = 'Wrong facing direction';
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

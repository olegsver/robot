<?php

namespace Robot\Components\ValidationRules;

use Illuminate\Contracts\Validation\Rule;
use Robot\Dto\Source;
use Robot\Enums\SectorStates;

class CorrectMap implements Rule
{
    private $lastError = ':attribute contains incorrect map';

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (!$value instanceof Source) {
            return false;
        }
        if (empty($value->map) || !is_array($value->map)) {
            return false;
        }
        foreach ($value->map as $yCoord => $xPack) {
            if (!is_array($xPack)) {
                $this->lastError = "map[{$yCoord}] is not array";
                return false;
            }
            if ($this->validateStates($xPack) === false) {
                return false;
            }
        }
        return true;
    }


    private function validateStates(array $yPack): bool
    {
        foreach ($yPack as $xCord => $value) {
            if (!in_array($value, SectorStates::getAll())) {
                $this->lastError = "Incorrect sector state in map: {$value}";
                return false;
            }
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
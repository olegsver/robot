<?php

namespace Robot\Interfaces;

/**
 * Interface Validate
 */
interface Validate
{
    /**
     * @param array $data
     *
     * @throws \Robot\Exceptions\ValidationException
     */
    public function validateOrFail(array $data): void;
}

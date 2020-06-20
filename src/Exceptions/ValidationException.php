<?php

namespace Robot\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

class ValidationException extends Exception
{
    /**
     * @var MessageBag
     */
    private $errors;

    /**
     * ValidationException constructor.
     *
     * @param MessageBag $errors
     */
    public function __construct(MessageBag $errors)
    {
        parent::__construct();
        $this->errors = $errors;
    }

    /**
     * @return MessageBag
     */
    public function getErrors(): MessageBag
    {
        return $this->errors;
    }

    /**
     * Gets validation messages as an array [attribute name => [errors]]
     *
     * @return array
     */
    public function getErrorsAsArray(): array
    {
        return $this->errors->toArray();
    }

    /**
     * Gets validation messages by an attribute name
     *
     * @param $attribute
     *
     * @return array
     */
    public function getErrorByAttribute($attribute): array
    {
        return $this->errors->get($attribute);
    }
}

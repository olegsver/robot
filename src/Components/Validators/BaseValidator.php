<?php

namespace Robot\Components\Validators;

use Illuminate\Validation\Factory;
use Robot\Components\Factories\TranslatorFactory;
use Robot\Enums\Language;
use Robot\Exceptions\ValidationException;
use Robot\Interfaces\Validate;

abstract class BaseValidator implements Validate
{
    /**
     * @var Factory
     */
    private $validationFactory;

    /**
     * Validator constructor.
     *
     * @param TranslatorFactory $translatorFactory
     */
    public function __construct(TranslatorFactory $translatorFactory)
    {
        $this->validationFactory = new Factory(
            $translatorFactory->create(Language::DEFAULT_LANGUAGE)
        );
    }


    /**
     * @return array
     */
    abstract protected function rules(): array;

    /**
     * @param array $data
     *
     * @throws ValidationException
     */
    public function validateOrFail(array $data): void
    {
        $validation = $this->validationFactory->make($data, $this->rules(), $this->messages());
        if ($validation->fails()) {
            throw new ValidationException($validation->errors());
        }
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'integer' => 'The :attribute must be an integer.',
            'string' => 'The :attribute must be a string.',
            'min' => 'The :attribute must be min :min.',
            'max' => 'The :attribute must be max :max.',
            'required' => 'The :attribute can not be blank.',
            'boolean' => 'The :attribute must be a boolean',
            'in' => 'The :attribute must be one of the following types: :values',
            'array' => 'The :attribute must be an array',
        ];
    }

}
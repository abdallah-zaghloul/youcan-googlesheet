<?php

namespace App\Validators;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\RedirectResponse;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\LaravelValidator;

abstract class BaseValidator extends LaravelValidator
{
    public int $defaultStringLength;


    public function __construct(Factory $validator)
    {
        parent::__construct($validator);
        $this->defaultStringLength = $this->defaultStringLength();
        $this->setRules($this->rules());
    }

    public function defaultStringLength(): int
    {
        return (int)config('app.default_string_length', 191);
    }

    abstract public function rules(): array;

    public function setDataFromRequest(...$keys): static
    {
        return $this->with(request()->only(...$keys));
    }

    /**
     * @throws ValidatorException
     */
    public function dataOrFail(?string $action = null, ?callable $failCallable = null): array
    {
        if (!$this->passes($action)) {
            return $failCallable ? $failCallable() : throw new ValidatorException($this->errorsBag());
        }

        return $this->data;
    }

    /**
     */
    public function dataOrBack(?string $action = null): array|RedirectResponse
    {
        if (!$this->passes($action)) {
            return redirect()->back()->withErrors($this->errors());
        }

        return $this->data;
    }
}

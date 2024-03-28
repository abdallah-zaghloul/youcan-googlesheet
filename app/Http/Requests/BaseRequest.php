<?php

namespace App\Http\Requests;

use App\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

abstract class BaseRequest extends FormRequest
{
    use Response;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * @param Validator $validator
     * @return RedirectResponse|mixed|void
     */
    protected function failedValidation(Validator $validator)
    {
        return $this->expectsJson() ? $this->errorResponse($validator->errors()->messages()) : redirect()->back()->withErrors($validator);
    }

    /**
     * @return int
     */
    protected function getDefaultStringLength(): int
    {
        return config('app.default_string_length');
    }
}

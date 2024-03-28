<?php

namespace App\Validators;

/**
 * Class SheetValidator.
 *
 * @package namespace App\Validators;
 */
class SheetValidator extends BaseValidator
{
    public const RULE_SAVE = 'save';


    public function rules(): array
    {
        return [
            self::RULE_SAVE => [
                "client_id" => ["required", "string", "max:$this->defaultStringLength"],
                "fields" => ["required", "array"],
            ]
        ];
    }
}

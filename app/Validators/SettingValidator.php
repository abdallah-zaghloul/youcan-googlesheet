<?php

namespace App\Validators;

/**
 * Class SettingValidator.
 *
 * @package namespace App\Validators;
 */
class SettingValidator extends BaseValidator
{
    public const RULE_SET = 'set';


    public function rules(): array
    {
        return [
            self::RULE_SET => [
                "client_id" => ["required", "string", "max:$this->defaultStringLength"],
                "client_secret" => ["required", "string", "max:$this->defaultStringLength"],
                "is_connected" => ["required", "boolean"],
            ]
        ];
    }
}

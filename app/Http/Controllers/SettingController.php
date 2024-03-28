<?php

namespace App\Http\Controllers;

use App\Services\SettingService;
use App\Traits\Response;
use App\Validators\SettingValidator;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class SettingController
{
    use Response;

    /**
     * @throws Exception
     */
    public function __construct(
        protected SettingService   $settingService,
        protected SettingValidator $settingValidator
    )
    {

    }

    public function get(): JsonResponse
    {
        $setting = $this->settingService->get();
        return $this->dataResponse(data: $setting);
    }

    /**
     * @throws ValidatorException
     */
    public function set(Request $request): JsonResponse
    {
        $this->settingValidator->with(data: $request->only('client_id', 'client_secret', 'is_connected'))
            ->passesOrFail(action: SettingValidator::RULE_SET);

        $setting = $this->settingService->set(
            client_id: $request->get('client_id'),
            client_secret: $request->get('client_secret'),
            is_connected: $request->boolean('is_connected')
        );

        return $this->dataResponse(data: $setting);
    }
}

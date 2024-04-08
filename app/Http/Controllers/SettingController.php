<?php

namespace App\Http\Controllers;

use App\Services\SettingService;
use App\Traits\Response;
use App\Validators\SettingValidator;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;
use YouCan\Models\Session;
use YouCan\Services\CurrentAuthSession;

class SettingController
{
    use Response;

    protected Session $youcanSession;

    /**
     * @throws Exception
     */
    public function __construct(
        protected SettingService   $settingService,
        protected SettingValidator $settingValidator
    )
    {
        $this->youcanSession = CurrentAuthSession::getCurrentSession();
    }


    /**
     * @throws ValidatorException
     * @throws Exception
     */
    public function set(Request $request): JsonResponse
    {
        $this->settingValidator->with(data: $request->only('client_id', 'client_secret', 'is_connected'))
            ->passesOrFail(action: SettingValidator::RULE_SET);

        $setting = $this->settingService->set(
            store_id: $this->youcanSession->getStoreId(),
            seller_id: $this->youcanSession->getSellerId(),
            client_id: $request->get('client_id'),
            client_secret: $request->get('client_secret'),
            is_connected: $request->boolean('is_connected')
        );

        return $this->dataResponse($setting);
    }


    /**
     * @throws Exception
     */
    public function get(): JsonResponse
    {
        $setting = $this->settingService->get(
            store_id: $this->youcanSession->getStoreId(),
            seller_id: $this->youcanSession->getSellerId()
        );

        return $this->dataResponse($setting);
    }
}

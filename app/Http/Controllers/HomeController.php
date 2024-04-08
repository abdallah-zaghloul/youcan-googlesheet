<?php

namespace App\Http\Controllers;

use App\Services\SettingService;
use App\Traits\Response;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use YouCan\Services\CurrentAuthSession as SessionService;

class HomeController
{
    use Response;

    /**
     * @throws Exception
     */
    public function __construct(
        protected SessionService   $sessionService,
        protected SettingService   $settingService,
    )
    {

    }

    /**
     * @throws Exception
     */
    public function __invoke(): Renderable
    {
        $session = $this->sessionService::getCurrentSession();
        $setting = $this->settingService->get(
            store_id: $session->getStoreId(),
            seller_id: $session->getSellerId()
        );
        return view('index', compact('setting', 'session'));
    }
}

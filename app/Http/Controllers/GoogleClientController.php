<?php

namespace App\Http\Controllers;

use App\Services\GoogleClientService;
use Exception;
use Illuminate\Http\RedirectResponse;

class GoogleClientController
{

    /**
     * @param GoogleClientService $googleClientService
     */
    public function __construct(
        protected GoogleClientService   $googleClientService,
    )
    {
    }

    public function connect(): RedirectResponse
    {
       return $this->googleClientService->authorize();
    }
}

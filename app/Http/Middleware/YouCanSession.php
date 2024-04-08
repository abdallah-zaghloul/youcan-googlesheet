<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use YouCan\Models\Session;
use YouCan\Services\CurrentAuthSession as SessionService;

class YouCanSession
{
    public function __construct(
        protected SessionService $sessionService,
    )
    {
    }


    /**
     * @throws Exception
     */
    public function handle(Request $request, Closure $next)
    {
        if ($youcanSession = $this->getCurrentSession())
            Cache::put($youcanSession->getStoreId(), $youcanSession);
        else $this->sessionService::setCurrentSession(Cache::get($request->header('x-api-key')));
        return $next($request);
    }

    protected function getCurrentSession(): ?Session
    {
        try {
            return $this->sessionService::getCurrentSession();
        } catch (\Exception $exception) {
            return null;
        }
    }
}

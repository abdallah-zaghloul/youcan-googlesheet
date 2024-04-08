<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Services;

use App\Models\Setting;
use Exception;
use Google\Client;
use Google\Service\PeopleService;
use Google\Service\Sheets;
use Illuminate\Http\RedirectResponse;
use YouCan\Models\Session;
use YouCan\Services\CurrentAuthSession;

class GoogleClientService
{
    protected Session $youcanSession;
    /**
     * @throws Exception
     */
    public function __construct(
        protected SettingService $settingService,
        protected Client  $googleClient,
        protected array   $scopes = [PeopleService::USERINFO_EMAIL, Sheets::SPREADSHEETS]
    )
    {
        $this->youcanSession = CurrentAuthSession::getCurrentSession();
    }

    public function authorize(): RedirectResponse
    {
        $authURL = $this->get()->createAuthUrl($this->scopes);
        return redirect()->to($authURL);
    }

    public function get(): Client
    {
        $setting = $this->settingService->get(
            store_id: $this->youcanSession->getStoreId(),
            seller_id: $this->youcanSession->getSellerId()
        );
        $this->googleClient->setClientId($setting->clientId()->getValue());
        $this->googleClient->setClientSecret($setting->clientSecret()->getValue());
        $this->googleClient->addScope($this->scopes);
        $this->googleClient->setRedirectUri(config('youcan.api_redirect'));
        $this->googleClient->setAccessType("offline");
        $this->googleClient->setPrompt("consent");
        $this->googleClient->setState($setting->storeId()->getValue());
        $this->googleClient->setAccessToken($setting->accessToken()->getValue());
        return $this->googleClient;
    }

}

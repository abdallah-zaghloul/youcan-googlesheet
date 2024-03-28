<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Services;

use App\Models\Setting;
use Google\Client;
use Google\Service\PeopleService;
use Google\Service\Sheets;
use Illuminate\Http\RedirectResponse;
use YouCan\Models\Session;
use YouCan\Services\CurrentAuthSession;

class GoogleClientService
{
    /**
     * @throws \Exception
     */
    public function __construct(
        protected SettingService $settingService,
        protected Client  $client,
        protected Session $session,
        protected array   $scopes = [PeopleService::USERINFO_EMAIL, Sheets::SPREADSHEETS]
    )
    {
        $this->session = CurrentAuthSession::getCurrentSession();
    }

    public function authorize(Setting $setting): RedirectResponse
    {
        $authURL = $this->get()->createAuthUrl($this->scopes);
        return redirect()->to($authURL);

    }

    public function get(): Client
    {
        $setting = $this->settingService->get();
        $this->client->setClientId($setting->clientId()->getValue());
        $this->client->setClientSecret($setting->clientSecret()->getValue());
        $this->client->addScope($this->scopes);
        $this->client->setRedirectUri(config('youcan.api_redirect'));
        $this->client->setAccessType("offline");
        $this->client->setPrompt("consent");
        $this->client->setState($setting->storeId()->getValue());
        $this->client->setAccessToken($setting->accessToken()->getValue());
        return $this->client;
    }

}

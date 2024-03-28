<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Services;

use App\Criteria\SettingPerStoreCriteria;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Exception;
use YouCan\Models\Session;
use YouCan\Services\CurrentAuthSession;

class SettingService
{
    /**
     * @throws Exception
     */
    public function __construct(
        protected Session           $session,
        protected SettingRepository $settingRepository
    )
    {
        $this->session = CurrentAuthSession::getCurrentSession();
    }

    public function get(): ?Setting
    {
        return $this->settingRepository->getByCriteria(app(SettingPerStoreCriteria::class, [
            'store_id' => $this->session->getStoreId(),
            'seller_id' => $this->session->getSellerId()
        ]))->first();
    }

    public function set(string $client_id, string $client_secret, bool $is_connected = false): ?Setting
    {
        return $this->settingRepository->updateOrCreate([
            Setting::STORE_ID => $this->session->getStoreId(),
            Setting::SELLER_ID => $this->session->getSellerId(),
        ], [
            Setting::STORE_ID => $this->session->getStoreId(),
            Setting::SELLER_ID => $this->session->getSellerId(),
            Setting::CLIENT_ID => $client_id,
            Setting::CLIENT_SECRET => $client_secret,
            Setting::IS_CONNECTED => $is_connected,
        ]);
    }

}

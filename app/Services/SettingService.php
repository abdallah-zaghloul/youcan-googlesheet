<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Services;

use App\Criteria\SettingPerStoreCriteria;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Exception;

class SettingService
{
    /**
     * @throws Exception
     */
    public function __construct(
        protected SettingRepository $settingRepository
    )
    {
    }

    public function get(string $store_id, string $seller_id): ?Setting
    {
        return $this->settingRepository->getByCriteria(app(SettingPerStoreCriteria::class, [
            'store_id' => $store_id,
            'seller_id' => $seller_id
        ]))->first();
    }

    public function set(
        string $store_id,
        string $seller_id ,
        string $client_id,
        string $client_secret,
        bool $is_connected = false
    ): ?Setting
    {
        return $this->settingRepository->updateOrCreate([
            Setting::STORE_ID => $store_id,
            Setting::SELLER_ID => $seller_id,
        ], [
            Setting::STORE_ID => $store_id,
            Setting::SELLER_ID => $seller_id,
            Setting::CLIENT_ID => $client_id,
            Setting::CLIENT_SECRET => $client_secret,
            Setting::IS_CONNECTED => $is_connected,
        ]);
    }
}

<?php

namespace App\Transformers;

use App\Models\Setting;
use League\Fractal\TransformerAbstract;

/**
 * Class SettingTransformer.
 *
 * @package namespace App\Transformers;
 */
class SettingTransformer extends TransformerAbstract
{
    /**
     * Transform the Setting entity.
     *
     * @param Setting $model
     *
     * @return array
     */
    public function transform(Setting $model): array
    {
        return [
            $model->getKeyName() => $model->getKey(),
            $model::STORE_ID => $model->storeId()->getValue(),
            $model::SELLER_ID => $model->sellerId()->getValue(),
            $model::CLIENT_ID => $model->clientId()->getValue(),
            $model::CLIENT_SECRET => $model->clientSecret()->getValue(),
            $model::ACCESS_TOKEN => $model->accessToken()->getValue(),
        ];
    }
}

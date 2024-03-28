<?php

namespace App\Criteria;

use App\Models\Setting;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class SettingPerStoreCriteria.
 *
 * @package namespace App\Criteria;
 */
class SettingPerStoreCriteria implements CriteriaInterface
{
    public function __construct(
        protected string $store_id,
        protected string $seller_id,
    )
    {
    }

    /**
     * Apply criteria in query repository
     *
     * @param mixed $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     *
     */
    public function apply($model, RepositoryInterface $repository): mixed
    {
        return $model->where([
            Setting::STORE_ID => $this->store_id,
            Setting::SELLER_ID => $this->seller_id
        ]);
    }
}

<?php

namespace App\Criteria;

use App\Models\Sheet;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class SheetPerStoreCriteria.
 *
 * @package namespace App\Criteria;
 */
class SheetPerStoreCriteria implements CriteriaInterface
{
    public function __construct(
        protected string $store_id,
        protected ?bool  $is_active = null,
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
        return $model->where(column: Sheet::STORE_ID, value: $this->store_id)->when(isset($this->is_active),
            fn(Builder|Sheet $query) => $query->where(column: Sheet::IS_ACTIVE, value: $this->is_active));
    }
}

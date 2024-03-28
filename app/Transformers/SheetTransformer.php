<?php

namespace App\Transformers;

use App\Models\Sheet;
use League\Fractal\TransformerAbstract;

/**
 * Class SheetTransformer.
 *
 * @package namespace App\Transformers;
 */
class SheetTransformer extends TransformerAbstract
{
    /**
     * Transform the Sheet entity.
     *
     * @param Sheet $model
     *
     * @return array
     */
    public function transform(Sheet $model): array
    {
        return [
            $model->getKeyName() => $model->getKey(),
        ];
    }
}

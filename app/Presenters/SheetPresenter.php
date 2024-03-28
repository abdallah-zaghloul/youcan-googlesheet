<?php

namespace App\Presenters;

use App\Transformers\SheetTransformer;
use League\Fractal\TransformerAbstract;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SheetPresenter.
 *
 * @package namespace App\Presenters;
 */
class SheetPresenter extends FractalPresenter
{

    /**
     * Transformer
     *
     * @return SheetTransformer|TransformerAbstract
     */
    public function getTransformer(): SheetTransformer|TransformerAbstract
    {
        return app(SheetTransformer::class);
    }
}

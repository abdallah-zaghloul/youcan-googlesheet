<?php

namespace App\Presenters;

use App\Transformers\SettingTransformer;
use League\Fractal\TransformerAbstract;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SettingPresenter.
 *
 * @package namespace App\Presenters;
 */
class SettingPresenter extends FractalPresenter
{

    /**
     * Transformer
     *
     * @return SettingTransformer|TransformerAbstract
     */
    public function getTransformer(): SettingTransformer|TransformerAbstract
    {
        return app(SettingTransformer::class);
    }
}

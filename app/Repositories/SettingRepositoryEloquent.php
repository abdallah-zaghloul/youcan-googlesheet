<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SettingRepository;
use App\Models\Setting;
use App\Validators\SettingValidator;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class SettingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SettingRepositoryEloquent extends BaseRepository implements SettingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Setting::class;
    }

    /**
    * Specify Validator class name
    *
    * @return string
     */
    public function validator(): string
    {
        return SettingValidator::class;
    }
}

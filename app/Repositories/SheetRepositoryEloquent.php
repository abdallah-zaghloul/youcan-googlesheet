<?php

namespace App\Repositories;

use App\Models\Sheet;
use App\Validators\SheetValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class SheetRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SheetRepositoryEloquent extends BaseRepository implements SheetRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Sheet::class;
    }

    /**
    * Specify Validator class name
    *
    * @return string
     */
    public function validator(): string
    {
        return SheetValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

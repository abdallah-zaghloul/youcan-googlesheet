<?php

namespace App\Http\Controllers;

use App\Services\SheetService;
use App\Validators\SheetValidator;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class SheetController
{
    /**
     * @throws Exception
     */
    public function __construct(
        protected SheetService   $sheetService,
        protected SheetValidator $sheetValidator
    )
    {

    }
}

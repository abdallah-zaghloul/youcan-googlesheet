<?php

use Illuminate\Support\Facades\Route;
use YouCan\Http\Middleware\YouCanAuthenticate;
use YouCan\Http\Middleware\YouCanCSPHeaders;
use YouCan\Services\CurrentAuthSession;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => "<pre>"
    . json_encode(
        value: [
            'request' => request()->all(),
            'headers' => getallheaders(),
            'session' => CurrentAuthSession::getCurrentSession()
        ],
        flags: JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
    )
    . "</pre>"
)->middleware([YouCanAuthenticate::class, YouCanCSPHeaders::class]);

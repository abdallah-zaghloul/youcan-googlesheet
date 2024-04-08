<?php

use App\Http\Controllers\GoogleClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use YouCan\Http\Middleware\YouCanAuthenticate;
use YouCan\Http\Middleware\YouCanCSPHeaders;

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

//main vue entry point
Route::get('/', HomeController::class)->name('home');

Route::group([
    'prefix' => 'setting',
    'as' => 'setting.',
    'middleware' => [YouCanAuthenticate::class, YouCanCSPHeaders::class],
], function () {
    Route::get('/', [SettingController::class, 'get'])->name('get');
    Route::post('/', [SettingController::class, 'set'])->name('set');
});

Route::group([
    'prefix' => 'google-client',
    'as' => 'google-client.',
], function () {
    Route::post('/', [GoogleClientController::class, 'connect'])->name('connect');
});

Route::group([
    'prefix' => 'sheets',
    'as' => 'sheets.',
    'middleware' => [YouCanAuthenticate::class, YouCanCSPHeaders::class],
], function () {

});

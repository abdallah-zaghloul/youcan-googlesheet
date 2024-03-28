<?php

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
//Route::view('/{vue_capture?}','index')->where('vue_capture', '[\/\w\.-]*');
Route::view('/', 'index')->name('index');

Route::group([
    'prefix' => 'setting',
    'as' => 'setting.',
    'middleware' => [YouCanAuthenticate::class, YouCanCSPHeaders::class],
], function () {
    Route::get('/', [SettingController::class, 'get'])->name('get');
    Route::post('/', [SettingController::class, 'set'])->name('set');
});

<?php

use App\Http\Controllers\ContactController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('contact', ContactController::class)->middleware(['auth']);

Route::post('/contectstore', "App\Http\Controllers\ContactController@form");







require __DIR__.'/auth.php';

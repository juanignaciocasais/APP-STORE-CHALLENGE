<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;

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

Route::get('/apps', ['uses' => 'App\Http\Controllers\AppController@index']);
Route::get('/', function () {
    return redirect(RouteServiceProvider::HOME);
});

Auth::routes();

Route::get('/me/apps/add', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/me/apps', [App\Http\Controllers\UsersController::class, 'index'])->name('my/apps');


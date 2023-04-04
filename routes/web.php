<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Password;
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
Route::get('/password', [Password\IndexController::class, 'show'])->name('password.index');
Route::post('/password/search', [Password\SearchController::class, 'show'])->name('password.search');
Route::get('/password/create', [Password\CreateController::class, 'show']);
Route::post('/password/create', [Password\CreateController::class, 'create'])->name('password.create');

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
Route::get('/', [Password\IndexController::class, 'show'])->name('password.index');
Route::post('/search', [Password\SearchController::class, 'show'])->name('password.search');
Route::get('/create/{id}', [Password\CreateController::class, 'show'])->name('password.show.create');
Route::post('/create/{id}', [Password\CreateController::class, 'create'])->name('password.create');
Route::delete('/delete/{id}', [Password\DeleteController::class, 'delete'])->name('password.delete');
Route::post('/import', [Password\ImportController::class, 'import'])->name('password.import');
Route::post('/export', [Password\ExportController::class, 'export'])->name('password.export');
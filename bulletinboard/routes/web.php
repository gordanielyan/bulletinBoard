<?php

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

Auth::routes();

Route::get('/', [\App\Http\Controllers\AdController::class, 'index'])->name('home');
Route::post('/', [\App\Http\Controllers\AdController::class, 'store']);
Route::get('/edit', [\App\Http\Controllers\AdController::class, 'create']);
Route::put('/{id}', [\App\Http\Controllers\AdController::class, 'update']);
Route::get('/{id}', [\App\Http\Controllers\AdController::class, 'show']);
Route::delete('/delete/{id}', [\App\Http\Controllers\AdController::class, 'destroy']);
Route::get('/edit/{id}', [\App\Http\Controllers\AdController::class, 'edit']);

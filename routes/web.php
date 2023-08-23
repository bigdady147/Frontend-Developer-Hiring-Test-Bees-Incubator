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

Route::get('/question-1', [\App\Http\Controllers\WebController::class, 'getQuestion1'])->name('question-1');
Route::get('/question-2', [\App\Http\Controllers\WebController::class, 'getQuestion2'])->name('question-2');

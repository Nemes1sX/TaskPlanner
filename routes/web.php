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

Route::redirect('/', 'login')->middleware('guest');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('task/{task}/start', [App\Http\Controllers\TaskController::class, 'start'])->name('task.start')
        ->middleware('task.owner');
    Route::get('task/{task}/stop', [App\Http\Controllers\TaskController::class, 'stop'])->name('task.stop')
        ->middleware('task.owner');
    Route::resource('task', App\Http\Controllers\TaskController::class);
});
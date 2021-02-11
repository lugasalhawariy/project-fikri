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

Route::get('/', [App\Http\Controllers\MachineController::class, 'index'])->name('home');

Route::resource('machine', App\Http\Controllers\MachineController::class);
Route::resource('employee', App\Http\Controllers\EmployeeController::class);
Route::resource('history', App\Http\Controllers\HistoryController::class);
Route::resource('gallery', App\Http\Controllers\GalleryController::class);
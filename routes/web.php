<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\AddMatkulController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(DashboardController::class)->prefix('dashboard')->group(function(){
    Route::get('', 'index')->name('dashboard');
});

Route::controller(EditController::class)->prefix('edit')->group(function(){
    Route::get('', 'index')->name('edit');
});

Route::controller(AddMatkulController::class)->prefix('addmatkul')->group(function(){
    Route::get('', 'index')->name('addmatkul');
});
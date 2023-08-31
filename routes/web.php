<?php

use App\Http\Controllers\AddCpmkController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardMhsController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\AddMatkulController;
use App\Http\Controllers\AddSoalController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CpmkController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\GenerateSoalController;
use App\Http\Controllers\HasilAsesmenController;
use App\Http\Controllers\MahasiswaProfileController;
use App\Http\Controllers\MakeSoalUjianController;
use App\Http\Controllers\MhsAuthController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\RemedialController;
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


Route::get('/', [MhsAuthController::class, 'index'])->name('mahasiswa');

Route::controller(AdminAuthController::class)->prefix('admin')->group(function(){
    Route::get('', 'index')->name('admin');
});

Route::controller(DashboardAdminController::class)->prefix('dashboard')->group(function(){
    Route::get('', 'index')->name('dashboard');
});

Route::controller(DashboardMhsController::class)->prefix('dashboardmhs')->group(function(){
    Route::get('', 'index')->name('dashboardmhs');
});

Route::controller(EditController::class)->prefix('edit')->group(function(){
    Route::get('', 'index')->name('edit');
});

Route::controller(AddMatkulController::class)->prefix('addmatkul')->group(function(){
    Route::get('', 'index')->name('addmatkul');
});

Route::controller(CpmkController::class)->prefix('cpmk')->group(function(){
    Route::get('', 'index')->name('cpmk');
});

Route::controller(AddCpmkController::class)->prefix('addcpmk')->group(function(){
    Route::get('', 'index')->name('addcpmk');
});

Route::controller(AddSoalController::class)->prefix('addsoal')->group(function(){
    Route::get('', 'index')->name('addsoal');
});

Route::controller(ChartController::class)->prefix('chart')->group(function(){
    Route::get('', 'index')->name('chart');
});

Route::controller(UjianController::class)->prefix('ujian')->group(function(){
    Route::get('', 'index')->name('ujian');
});

Route::controller(RemedialController::class)->prefix('remedial')->group(function(){
    Route::get('', 'index')->name('remedial');
});

Route::controller(HasilAsesmenController::class)->prefix('asesmen')->group(function(){
    Route::get('', 'index')->name('asesmen');
});

Route::controller(GenerateSoalController::class)->prefix('generatesoal')->group(function(){
    Route::get('', 'index')->name('generatesoal');
});

Route::controller(MakeSoalUjianController::class)->prefix('makesoalujian')->group(function(){
    Route::get('', 'index')->name('makesoalujian');
});

Route::controller(MahasiswaProfileController::class)->prefix('profilemhs')->group(function(){
    Route::get('', 'index')->name('profilemhs');
});

Route::controller(AdminProfileController::class)->prefix('profileadmin')->group(function(){
    Route::get('', 'index')->name('profileadmin');
});
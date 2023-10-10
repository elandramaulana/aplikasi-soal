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
use App\Http\Controllers\ProfileController;
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

Route::controller(AdminAuthController::class)->prefix('admin')->group(function () {
    Route::get('', 'index')->name('admin');
});

//Route::controller(MahasiswaProfileController::class)->prefix('profilemhs')->group(function () {
//    Route::get('', 'index')->name('profilemhs');
//});
//
//Route::controller(AdminProfileController::class)->prefix('profileadmin')->group(function () {
//    Route::get('', 'index')->name('profileadmin');
//});

Route::middleware(['auth','checkRole:admin'])->group(function () {
    //profile admin
    Route::get('/profileadmin', [AdminProfileController::class, 'index'])->name('profileadmin');
    //dashboard admin
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    //matkul
    Route::get('/matkul', [AddMatkulController::class, 'index'])->name('getmatkul');
    Route::post('/matkul', [AddMatkulController::class, 'store'])->name('matkul');
    Route::get('/matkul-edit/{id}', [AddMatkulController::class, 'edit'])->name('editmatkul');
    Route::put('/matkul-edit', [AddMatkulController::class, 'update'])->name('editmatkul');
    Route::get('/matkul/{id}', [AddMatkulController::class, 'hapus'])->name('deletematkul');
    //cpmk
    Route::get('/{id}/cpmk', [CpmkController::class, 'index'])->name('getcpmk');
    Route::get('/{id}/addcpmk', [AddCpmkController::class, 'index'])->name('cpmk');
    Route::post('/addcpmk', [CpmkController::class, 'store'])->name('addcpmk');
//    Route::get('/cpmk-edit/{id}', [CpmkController::class, 'edit'])->name('editcpmk');
//    Route::put('/cpmk-edit', [CpmkController::class, 'update'])->name('editcpmk');
    Route::get('/cpmk/{id}', [CpmkController::class, 'hapus'])->name('deletecpmk');
    //soal
    Route::get('/{id}/soal', [AddSoalController::class, 'index'])->name('soal');
    Route::get('/{id}/addsoal', [AddSoalController::class, 'store'])->name('addsoal');
    Route::post('/addsoalesy', [AddSoalController::class, 'store_essay'])->name('addsoalesy');
    Route::post('/addsoalobj', [AddSoalController::class, 'store_objective'])->name('addsoalobj');
    //generate soal
    Route::get('/generatesoal', [GenerateSoalController::class, 'index'])->name('generatesoal');
    Route::post('/generate-paket-soal', [GenerateSoalController::class, 'generatePaketSoal'])->name('generate-paket-soal');
    Route::get('/{id}/generate-soal', [MakeSoalUjianController::class, 'index'])->name('makesoalujian');
    //Paket soal
    Route::get('/{id}/paket-soal', [GenerateSoalController::class, 'showSoal'])->name('showsoal');
    Route::get('/paket-soal/{id}', [GenerateSoalController::class, 'hapus'])->name('deletesoal');
    //Chart
    Route::get('/chart', [ChartController::class, 'index'])->name('chart');
});

Route::middleware(['auth','checkRole:member'])->group(function () {
    //profile mhs
    Route::get('profilemhs', [MahasiswaProfileController::class, 'index'])->name('profilemhs');
    //dashboard mhs
    Route::get('/dashboardmhs', [DashboardMhsController::class, 'index'])->name('dashboardmhs');
    //assessment mhs
    Route::get('/asesmen', [HasilAsesmenController::class, 'index'])->name('asesmen');
    //ujian mhs
    Route::get('/ujian/{id}', [UjianController::class, 'index'])->name('ujian');
    //remedial
    Route::get('/remedial', [RemedialController::class, 'index'])->name('remedial');
});
//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

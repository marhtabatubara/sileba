<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\MataPelajaranController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guru\MateriController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Guru\TugasController;
use App\Http\Controllers\Guru\ProfileController as GuruProfileController;
use App\Http\Controllers\Siswa\MateriController as SiswaMateriController;
use App\Http\Controllers\Siswa\ProfileController as SiswaProfileController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;
use App\Http\Controllers\Siswa\TugasController as SiswaTugasController;
use Illuminate\Support\Facades\Route;

// Login
Route::redirect('/', 'auth', 301);
Route::get('auth',[AuthController::class, 'login'])->name('auth.login');
Route::prefix('auth')->name('auth.')->group(function(){
        Route::post('login',[AuthController::class, 'do_login'])->name('do_login');
});
Route::group(['middleware' => ['auth']], function () {
// Operator / Admin
    Route::redirect('admin', 'admin/dashboard', 301);
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::redirect('/', 'dashboard', 301);
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
        Route::resource('room', RoomController::class);
        Route::resource('pelajaran', MataPelajaranController::class);
        Route::resource('admin', AdminController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('siswa', SiswaController::class);
        // PROFILE
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('', [ProfileController::class, 'index'])->name('index');
            Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
            Route::patch('cprofile', [ProfileController::class, 'cprofile'])->name('cprofile');
            Route::post('save', [ProfileController::class, 'save'])->name('save');
        });
    });

    // Guru
    Route::prefix('guru')->name('guru.')->group(function() {
        Route::redirect('/', 'dashboard', 301);
        Route::resource('materi', MateriController::class);
        Route::resource('nilai', NilaiController::class);
        Route::resource('tugas', TugasController::class);
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
        // PROFILE
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('', [GuruProfileController::class, 'index'])->name('index');
            Route::get('edit', [GuruProfileController::class, 'edit'])->name('edit');
            Route::patch('cprofile', [GuruProfileController::class, 'cprofile'])->name('cprofile');
            Route::post('save', [GuruProfileController::class, 'save'])->name('save');
        });
    });
    
    // Siswa
    Route::prefix('siswa')->name('siswa.')->group(function() {
        Route::redirect('/', 'dashboard', 301);
        Route::resource('materi', SiswaMateriController::class);
        Route::resource('nilai', SiswaNilaiController::class);
        Route::resource('tugas', SiswaTugasController::class);
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
        // PROFILE
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('', [SiswaProfileController::class, 'index'])->name('index');
            Route::get('edit', [SiswaProfileController::class, 'edit'])->name('edit');
            Route::patch('cprofile', [SiswaProfileController::class, 'cprofile'])->name('cprofile');
            Route::post('save', [SiswaProfileController::class, 'save'])->name('save');
        });
    });
});
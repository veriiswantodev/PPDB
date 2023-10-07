<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    JurusanController,
    SettingController,
    SiswaController,
    DashboardController
};

Route::get('/', function(){
    return view('web');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('jurusan/data', [JurusanController::class, 'data'])->name('jurusan.data');
    Route::resource('/jurusan', JurusanController::class);

    Route::get('siswa/data', [SiswaController::class, 'data'])->name('siswa.data');
    Route::get('/siswa/export', [SiswaController::class, 'export'])->name('siswa.export');
    Route::get('/siswa/print/{id}', [SiswaController::class, 'print'])->name('siswa.print');
    Route::resource('/siswa', SiswaController::class);

    Route::get('setting/data', [SettingController::class, 'data'])->name('setting.data');
    Route::resource('/setting', SettingController::class);
});




Auth::routes();

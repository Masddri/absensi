<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JabatanController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(
    ['register' => false]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route admin
Route::group(['prefix' => 'admin'], function () {
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::resource('jabatan', JabatanController::class);
});


Route::get('/test', function(){
    return view('test');
});

// Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
// Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::get('/user', [UserController::class, 'index'])->name('user.index');

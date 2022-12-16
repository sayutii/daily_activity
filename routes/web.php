<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard']);

        Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan-index');
        Route::post('/karyawan/create', [KaryawanController::class, 'actionCreate'])->name('action-create');
        Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'actionFormUpdate'])->name('edit-form');
        Route::patch('/karyawan/update/{id}', [KaryawanController::class, 'actionUpdate'])->name('action-update');
        Route::delete('/karyawan/delete/{id}', [KaryawanController::class, 'actionDelete'])->name('action-delete');
        Route::post('/user', [UserController::class, 'actionCreate']);
    });
});
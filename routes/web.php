<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index');
    Route::get('panel/dashboard', 'dashboard');
    Route::get('panel/beritadaftar', 'beritadaftar');
    Route::get('panel/beritatambah', 'beritatambah');
    Route::post('panel/beritatambahsimpan', 'beritatambahsimpan');
    Route::get('panel/beritaedit/{id}', 'beritaedit');
    Route::post('panel/beritaeditsimpan/{id}', 'beritaeditsimpan');
    Route::get('panel/beritahapus/{id}', 'beritahapus');
    Route::get('panel/kategoridaftar', 'kategoridaftar');
    Route::get('panel/kategoritambah', 'kategoritambah');
    Route::post('panel/kategoritambahsimpan', 'kategoritambahsimpan');
    Route::get('panel/kategoriedit/{id}', 'kategoriedit');
    Route::post('panel/kategorieditsimpan/{id}', 'kategorieditsimpan');
    Route::get('panel/kategorihapus/{id}', 'kategorihapus');
    Route::get('panel/logout', 'logout');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('beritadaftar', 'beritadaftar');
    Route::get('beritadetail/{id}', 'beritadetail');
    Route::get('login', 'login');
    Route::post('logincek', 'logincek');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KaryaTulisController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\SaranController;

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

Route::middleware('guest')->group(function() {
    Route::get('/', [LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'login'])->name('login.validate');
});

Route::middleware('auth')->group(function() {
    Route::get('/home', [HomeController::class,'index'])->name('home');
    Route::get('/logout', [HomeController::class,'logout'])->name('logout');

    Route::resource('books', BooksController::class);

    Route::get('/diskusi/detail/{id}', [DiskusiController::class,'detail'])->name('diskusi.detail');
    Route::delete('/diskusi/detail/destroy/{id}', [DiskusiController::class,'detail_destroy'])->name('diskusi-detail.destroy');
    Route::resource('diskusi', DiskusiController::class);

    Route::post('/event/json', [EventController::class,'index_json'])->name('event.json');
    Route::resource('event', EventController::class);

    Route::resource('karya_tulis', KaryaTulisController::class);

    Route::resource('pengguna', PenggunaController::class);

    Route::resource('perpus', PerpusController::class);

    Route::resource('saran', SaranController::class);
});
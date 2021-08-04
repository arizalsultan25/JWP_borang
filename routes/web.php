<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TUController;

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

//View
Route::view('/', 'home')->name('home');
Route::view('/room-list', 'room-list')->name('room-list');


Route::get('/ruangan', function(){
    return view('room-detail');
})->name('room-detail');

// Controller
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('dosen-index');
});

Route::prefix('tata-usaha')->group(function () {
    Route::get('/', [TUController::class, 'index'])->name('tu-index');
});

// middleware auth
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});




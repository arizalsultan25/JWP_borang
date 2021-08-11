<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TUController;
use App\Models\Room;

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
Route::get('/', function(){
    return view('home', [
        'rooms' => Room::orderBy('kode', 'asc')->offset(0)->limit(6)->get()
    ]);
})->name('home');


// Controller
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('search', [RoomController::class, 'search'])->name('search');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');



// Prefix
Route::prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('dosen-index');
    Route::get('/borang', [DosenController::class, 'borang'])->name('dosen-borang');
    Route::post('/borang', [DosenController::class, 'konfirmasi'])->name('dosen-borang');


});

Route::prefix('tata-usaha')->group(function () {
    Route::get('/', [TUController::class, 'index'])->name('tu-index');
    Route::get('/ruangan', [TUController::class, 'ruangan'])->name('tu-ruangan');
    Route::get('/ruangan/create', [RoomController::class, 'create'])->name('tu-create-ruangan');
    Route::get('/ruangan/{kode}/edit', [RoomController::class, 'edit'])->name('tu-edit-ruangan');
    Route::get('/borang', [TUController::class, 'borang'])->name('tu-borang');
    // Route::post('/konfirmasi/{id}', [BookingController::class, 'update'])->name('tu-konfirmasi');

});

// middleware auth
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('sign-out');
});

// Resource
Route::resource('ruangan', RoomController::class);
Route::resource('borang', BookingController::class);




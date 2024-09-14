<?php

use App\Http\Controllers\authcontroller;
use App\Http\Controllers\daftarcontroller;
use App\Http\Controllers\inscontroller;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function (){
    Route::get('/login',[LoginController::class, 'login'])->name('login');
    Route::get('/register',[LoginController::class, 'register'])->name('register');
    Route::post('/signIn',[LoginController::class, 'signIn']);
    Route::post('/signUp',[LoginController::class, 'signUp']);

});
Route::middleware('auth')->group(function (){
    Route::get('/dashboard',[LoginController::class, 'dashboard'])->name('home');
    Route::get('/logout',[LoginController::class, 'logout']);
    Route::get('/kursus',[authcontroller::class, 'kursus'])->name('kursus');
    Route::get('/tambah/kursus',[authcontroller::class, 'tambahKursus']);
    Route::post('/simpan/kursus',[authcontroller::class, 'simpanKursus']);
    Route::get('/update/kursus/{id}',[authcontroller::class, 'updateKursus'])->name('updateKursus');
    Route::put('/upgrade/kursus/{id}',[authcontroller::class, 'upgradeKursus'])->name('upgradeKursus');
    Route::delete('/delete/kursus/{id}',[authcontroller::class, 'deleteKursus'])->name('deleteKursus');

    Route::get('/instruktur',[inscontroller::class,'ins'])->name('instruktur');
    Route::get('/tambahinstruktur',[inscontroller::class,'tambahv']);
    Route::post('tambahins',[inscontroller::class,'simpanins']);
    Route::get('/edit/{id}',[inscontroller::class,'updateins'])->name('updateview');
    Route::put('/edit/proses/{id}',[inscontroller::class,'upgradeins'])->name('update');
    Route::delete('/delete/{id}',[inscontroller::class,'deleteins'])->name('deleteins');

    Route::get('/pendaftaran',[daftarcontroller::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/tambah/pendaftaran',[daftarcontroller::class, 'tambahPendaftaran']);
    Route::post('/simpan/pendaftaran',[daftarcontroller::class, 'simpanPendaftaran']);
    Route::delete('/delete/pendaftaran/{id}',[daftarcontroller::class, 'deletePendaftaran'])->name('deletePendaftaran');
    Route::get('/update/pendaftaran/{id}',[daftarcontroller::class, 'updatePendaftaran'])->name('updatePendaftaran');
    Route::put('/upgrade/pendaftaran/{id}',[daftarcontroller::class, 'upgradePendaftaran'])->name('upgradePendaftaran');

});
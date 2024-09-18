<?php

use App\Http\Controllers\authcontroller;
use App\Http\Controllers\daftarcontroller;
use App\Http\Controllers\inscontroller;
use App\Http\Controllers\kelascontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\nilaiController;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\ulasancontroller;
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
    Route::delete('/delete/instruktur/{id}',[inscontroller::class,'deleteins'])->name('deleteInstruktur');

    Route::get('/pendaftaran',[daftarcontroller::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/tambah/pendaftaran',[daftarcontroller::class, 'tambahPendaftaran']);
    Route::post('/simpan/pendaftaran',[daftarcontroller::class, 'simpanPendaftaran']);
    Route::delete('/delete/pendaftaran/{id}',[daftarcontroller::class, 'deletePendaftaran'])->name('deletePendaftaran');
    Route::get('/update/pendaftaran/{id}',[daftarcontroller::class, 'updatePendaftaran'])->name('updatePendaftaran');
    Route::put('/upgrade/pendaftaran/{id}',[daftarcontroller::class, 'upgradePendaftaran'])->name('upgradePendaftaran');

    Route::get('/kelas',[kelascontroller::class,'kelas'])->name('kelas');
    Route::get('/tambahkelas',[kelascontroller::class,'tambahkelas']);
    Route::post('tambahkel',[kelascontroller::class,'simpankel']);
    Route::get('/edit/kelas/{id}',[kelascontroller::class,'updatekelas'])->name('updatekelas');
    Route::put('/edit/proses/{id}',[kelascontroller::class,'upgradekel'])->name('updatekel');
    Route::delete('/delete/kelas/{id}',[kelascontroller::class,'deletekelas'])->name('deletekelas');

    Route::get('/siswa',[siswacontroller::class, 'siswa'])->name('siswa');
    Route::get('/tambah/siswa',[siswacontroller::class, 'tambahSiswa']);
    Route::post('/simpan/siswa',[siswacontroller::class, 'simpanSiswa']);
    Route::delete('/delete/siswa/{id}',[siswacontroller::class, 'deleteSiswa'])->name('deleteSiswa');


    Route::get('/ulasan',[ulasancontroller::class,'ulasan'])->name('ulasan');
    Route::get('/tambahulasan',[ulasancontroller::class,'tambahu']);
    Route::post('tambahul',[ulasancontroller::class,'simpanul']);
    Route::get('/edit/ul/{id}',[ulasancontroller::class,'updateul'])->name('updateula');
    Route::put('/edit/ulasan/{id}',[ulasancontroller::class,'upgradeul'])->name('updateul');
    Route::delete('/delete/ulasan/{id}',[ulasancontroller::class,'deleteul'])->name('deleteulasan');

    Route::get('/nilai',[nilaiController::class, 'nilai'])->name('nilai');
    Route::get('/tambah/nilai',[nilaiController::class, 'tambahNilai']);
    Route::post('/simpan/nilai',[nilaiController::class, 'simpanNilai']);
    Route::get('/update/nilai/{id}',[nilaiController::class, 'updateNilai'])->name('updateNilai');
    Route::put('/upgrade/nilai/{id}',[nilaiController::class, 'upgradeNilai'])->name('upgradeNilai');
    Route::delete('/delete/nilai/{id}',[nilaiController::class, 'deleteNilai'])->name('deleteNilai');
});
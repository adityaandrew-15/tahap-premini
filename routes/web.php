<?php

use App\Http\Controllers\authcontroller;
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
    return view('dashboard');
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
});
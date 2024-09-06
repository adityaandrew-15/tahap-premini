<?php

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
    return view('login');
});

Route::middleware('guest')->group(function (){
    Route::get('/login',[LoginController::class, 'login'])->name('login');
    Route::get('/register',[LoginController::class, 'register'])->name('register');
    Route::post('/signIn',[LoginController::class, 'signIn']);
    Route::post('/signUp',[LoginController::class, 'signUp']);
});

Route::middleware('auth')->group(function (){
    
});
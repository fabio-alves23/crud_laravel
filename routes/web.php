<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;

// Página inicial
Route::get('/', function () {
    return view('home');
})->name('home');


// CRUD de Raças
Route::resource('racas', RacaController::class);

// CRUD de Propriedades
Route::resource('propriedades', PropriedadeController::class);

// CRUD de Animais
Route::resource('animais', AnimalController::class);




Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register'); // ← Aqui
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Área protegida
Route::middleware(['auth'])->group(function () {
    Route::get('/meus-animais', [App\Http\Controllers\AnimalController::class, 'index']);
});
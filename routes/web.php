<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\PropriedadeController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VacinacaoController;

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

// CRUD de Vacinações
Route::resource('vacinacoes', VacinacaoController::class);



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipanteController; // Importação do controlador

Route::get('/', function () {
    return view('home');
});

Route::get('/Cadastro', function () {
    return view('cadastro');
})->name('cadastro');

Route::get('/Sorteio', function () {
    return view('sorteio');
})->name('sorteio');

Route::post('/adicionar-participante', [ParticipanteController::class, 'store'])->name('participantes.store');
Route::get('/home', [ParticipanteController::class, 'index'])->name('home');


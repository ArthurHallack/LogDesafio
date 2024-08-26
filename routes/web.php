<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipanteController; // Importação do controlador

Route::get('/', function () {
    return view('home');
});

Route::get('/Cadastro', function () {
    return view('cadastro');
});

Route::post('/adicionar-participante', [ParticipanteController::class, 'store'])->name('participantes.store');

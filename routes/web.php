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

Route::get('/Editar', function () {
    return view('editar');
});

Route::post('/adicionar-participante', [ParticipanteController::class, 'store'])->name('participantes.store');
Route::get('/home', [ParticipanteController::class, 'index'])->name('home');
Route::get('/Sorteio', [ParticipanteController::class, 'sorteio'])->name('sorteio');
Route::get('/Editar/{id}', [ParticipanteController::class, 'edit'])->name('participantes.edit');
Route::put('/Atualizar/{id}', [ParticipanteController::class, 'update'])->name('participantes.update');




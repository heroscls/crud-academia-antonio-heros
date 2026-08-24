<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanoController;

Route::get('/', function () {
    return view('welcome');
});

// =========================
// PLANOS
// =========================

// Listar planos
Route::get('/planos', [PlanoController::class, 'index']);

// Formulário para cadastrar
Route::get('/planos/cadastrar', [PlanoController::class, 'create']);

// Salvar novo plano
Route::post('/planos/cadastrar', [PlanoController::class, 'store']);

// Visualizar um plano
Route::get('/planos/{id}', [PlanoController::class, 'show']);

// Formulário para editar
Route::get('/planos/{id}/editar', [PlanoController::class, 'edit']);

// Atualizar plano
Route::post('/planos/{id}/editar', [PlanoController::class, 'update']);

// Excluir plano
Route::post('/planos/{id}/excluir', [PlanoController::class, 'destroy']);

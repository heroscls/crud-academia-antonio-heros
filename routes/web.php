<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/logout', [AlunoController::class, 'logout'])->name('logout');
    Route::get('/alunos/listar', [MainController::class, 'index'])->name('alunos.index');
    Route::get('/alunos/editar/{id}', [AlunoController::class, 'editAluno'])->name('alunos.edit');
    Route::post('/alunos/editar', [AlunoController::class, 'editAlunoSubmit'])->name('alunos.editSubmit');
    Route::get('/alunos/excluir/{id}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
    Route::get('/planos', [PlanoController::class, 'index'])->name('planos.index');
    Route::get('/deleteAlunoConfirm/{id}', [AlunoController::class, 'deleteAlunoConfirm'])->name('deleteAlunoConfirm');


});


Route::middleware([CheckIsNotLogged::class])->group(function(){
    Route::get('/cadastro',[AlunoController::class, 'cadastro']);
    
    });
    Route::post('/login-submit', [AlunoController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/alunos/create', [AlunoController::class, 'cadastro'])->name('cadastrar');
    Route::get('/login', [AlunoController::class, 'login'])->name('login');
    Route::post('/alunos', [AlunoController::class, 'salvar'])->name('alunos.salvar');
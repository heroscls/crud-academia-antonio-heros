<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

Route::middleware([CheckIsLogged::class])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware([CheckIsNotLogged::class])->group(function(){
    Route::get('/alunos/create', [AuthController::class, 'cadastro'])->name('cadastrar');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/cadastro',[AuthController::class, 'cadastro']);
});
Route::post('/alunos', [AuthController::class, 'salvar'])->name('alunos.salvar');
Route::get('/alunos', [MainController::class, 'index'])->name('alunos.index');
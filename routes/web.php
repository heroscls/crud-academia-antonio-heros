<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlanoController;
use Illuminate\Support\Facades\Route;


// =========================
// ROTAS PÚBLICAS
// =========================

Route::middleware('CheckIsNotLogged')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');

    Route::get('/cadastro', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/cadastro', [AuthController::class, 'register'])
        ->name('register.store');
});


// =========================
// ROTAS PRIVADAS
// =========================

Route::middleware('CheckIsLogged')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/', [DashboardController::class, 'showDashboard'])
        ->name('home');


    // =========================
    // DASHBOARD
    // =========================

    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])
        ->name('dashboard');


    // =========================
    // PLANOS
    // =========================

    Route::get('/planos', [PlanoController::class, 'index'])
        ->name('planos.index');

    Route::get('/planos/cadastrar', [PlanoController::class, 'create'])
        ->name('planos.create');

    Route::post('/planos/cadastrar', [PlanoController::class, 'store'])
        ->name('planos.store');

    Route::get('/planos/{id}', [PlanoController::class, 'show'])
        ->name('planos.show');

    Route::get('/planos/{id}/editar', [PlanoController::class, 'edit'])
        ->name('planos.edit');

    Route::post('/planos/{id}/editar', [PlanoController::class, 'update'])
        ->name('planos.update');

    Route::post('/planos/{id}/excluir', [PlanoController::class, 'destroy'])
        ->name('planos.destroy');


    // =========================
    // ALUNOS
    // =========================

    Route::get('/alunos', [AlunoController::class, 'index'])
        ->name('alunos.index');

    Route::get('/alunos/cadastrar', [AlunoController::class, 'create'])
        ->name('alunos.create');

    Route::post('/alunos/cadastrar', [AlunoController::class, 'store'])
        ->name('alunos.store');

    Route::get('/alunos/{id}', [AlunoController::class, 'show'])
        ->name('alunos.show');

    Route::get('/alunos/{id}/editar', [AlunoController::class, 'edit'])
        ->name('alunos.edit');

    Route::post('/alunos/{id}/editar', [AlunoController::class, 'update'])
        ->name('alunos.update');

    Route::post('/alunos/{id}/excluir', [AlunoController::class, 'destroy'])
        ->name('alunos.destroy');
});
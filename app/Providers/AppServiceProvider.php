<?php

namespace App\Providers;

use App\Models\Aluno;
use App\Models\Plano;
use App\Models\User;
use App\Policies\AlunoPolicy;
use App\Policies\PlanoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Policies
        Gate::policy(Aluno::class, AlunoPolicy::class);
        Gate::policy(Plano::class, PlanoPolicy::class);

        // Gates
        Gate::define('admin', fn (User $user): bool => $user->isAdmin());

        Gate::define('ver-metricas-usuarios', fn (User $user): bool => $user->isAdmin());
    }
}
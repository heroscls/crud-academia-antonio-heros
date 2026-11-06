<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Plano;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard.dashboard', [
            'totalAlunos'    => Gate::allows('viewAny', Aluno::class) ? Aluno::count() : 0,
            'totalUsuarios'  => Gate::allows('ver-metricas-usuarios') ? User::count() : 0,
            'totalAdmins'    => Gate::allows('ver-metricas-usuarios')
                ? User::where('role', 'admin')->count()
                : 0,
            'totalPlanos'    => Plano::count(),
            'planosAtivos'   => Plano::where('status', 'ativo')->count(),
]);
    }
}

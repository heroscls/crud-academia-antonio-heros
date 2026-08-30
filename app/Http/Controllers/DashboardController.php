<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Plano;
use App\Models\User;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard.dashboard', [
            'totalAlunos'    => Aluno::count(),
            'totalUsuarios'  => User::count(),
            'totalAdmins'    => User::where('role', 'admin')->count(),
            'totalPlanos'    => Plano::count(),
            'planosAtivos'   => Plano::where('status', 'ativo')->count(),
        ]);
    }
}

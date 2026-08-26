<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function showDashboard()
    {

        return view('dashboard.dashboard');
    }
}
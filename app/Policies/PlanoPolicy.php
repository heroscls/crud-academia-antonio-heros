<?php

namespace App\Policies;

use App\Models\Plano;
use App\Models\User;

class PlanoPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Plano $plano): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Plano $plano): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Plano $plano): bool
    {
        return $user->isAdmin();
    }
}
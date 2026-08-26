<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@fitly.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        $this->call([
            PlanoSeeder::class,
            AlunoSeeder::class,
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Plano;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        {
            Plano::factory()->count(10)->create();
        }
    }
}

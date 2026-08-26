<?php

namespace Database\Seeders;

use App\Models\Plano;
use Illuminate\Database\Seeder;

class PlanoSeeder extends Seeder
{
    public function run(): void
    {
        Plano::create([
            'nome' => 'Plano Básico',
            'descricao' => 'Acesso básico à academia.',
            'preco' => 49.90,
            'duracao_dias' => 30,
            'status' => 'ativo',
        ]);

        Plano::create([
            'nome' => 'Plano Intermediário',
            'descricao' => 'Acesso completo à academia.',
            'preco' => 79.90,
            'duracao_dias' => 30,
            'status' => 'ativo',
        ]);

        Plano::create([
            'nome' => 'Plano Premium',
            'descricao' => 'Acesso completo com benefícios adicionais.',
            'preco' => 119.90,
            'duracao_dias' => 30,
            'status' => 'ativo',
        ]);
    }
}
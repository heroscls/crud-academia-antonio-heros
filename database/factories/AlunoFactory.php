<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Plano;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
            'data_nascimento' => fake()->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'),
            'objetivo' => fake()->randomElement([
                'Ganhar massa muscular',
                'Perder peso',
                'Melhorar condicionamento físico',
                'Aumentar resistência',
                'Melhorar qualidade de vida',
            ]),
            'plano_id' => Plano::inRandomOrder()->value('id'),
        ];
    }
}
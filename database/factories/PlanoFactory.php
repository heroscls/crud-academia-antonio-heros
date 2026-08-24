<?php

namespace Database\Factories;

use App\Models\Plano;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plano>
 */
class PlanoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->randomElement([
                'Plano Básico',
                'Plano Premium',
                'Plano Gold',
                'Plano Anual',
            ]),

            'descricao' => fake()->sentence(),

            'preco' => fake()->randomFloat(2, 50, 1000),

            'duracao_dias' => fake()->randomElement([
                30,
                60,
                90,
                180,
                365,
            ]),

            'status' => fake()->randomElement([
                'ativo',
                'inativo',
            ]),
        ];
    }
}

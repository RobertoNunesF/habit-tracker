<?php

namespace Database\Factories;

use App\Models\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $habits = [
            'Ler um livro por 30 minutos',
            'Fazer exercícios físicos por 30 minutos',
            'Meditar por 15 minutos',
            'Escrever um diário de gratidão',
            'Beber 2 litros de água por dia',
            'Dormir pelo menos 7 horas por noite',
        ];

        return [
            'user_id' => '1',
            'name' => $this->faker->unique()->randomElement($habits),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etoile>
 */
class EtoileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idPlat' => \App\Models\Plat::factory(),
            'idClient' => \App\Models\Client::factory(),
            'nombreEtoile'=>fake()->numberBetween(1, 5),

        ];
    }
}

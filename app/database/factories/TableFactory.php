<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numeroTable' => fake()->unique()->numberBetween(1, 100),
            'nbPlaces' => fake()->numberBetween(2, 10)
        ];
    }
}

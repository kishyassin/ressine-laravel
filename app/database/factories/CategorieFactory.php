<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    public function definition(): array
    {
        return [
            'designation' => fake()->unique()->word,
            'description' => fake()->unique()->sentence
        ];
    }
}


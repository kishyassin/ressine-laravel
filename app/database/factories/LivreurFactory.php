<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LivreurFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom' => fake()->lastName
        ];
    }
}

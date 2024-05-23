<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class TestimonialeFactory extends Factory
{

    public function definition(): array
    {
        return [
            'message' => fake()->text(),
            'jjmmaaaa' =>fake()->date(),
            'idClient' => \App\Models\Client::factory()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    public function definition(): array
    {
        return [
            'etat' => fake()->randomElement(['prepared', 'delivered', 'cancelled']),
            'idDate' => \App\Models\OrderDate::factory(),
            'numeroFacture' => \App\Models\Facture::factory(),
        ];
    }
}

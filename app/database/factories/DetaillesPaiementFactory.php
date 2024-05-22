<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetaillesPaiementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numeroCarte' => fake()->creditCardNumber,
            'idPaiement' => \App\Models\Paiement::factory()
        ];
    }
}

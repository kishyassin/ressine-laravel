<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaiementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'modePaiement' => fake()->randomElement(['cash', 'card', 'online']),
            'idClient' => \App\Models\Client::factory(),
            'numeroFacture' => \App\Models\Facture::factory()
        ];
    }
}

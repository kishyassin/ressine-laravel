<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaiementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'modePaiement' => fake()->randomElement(['Carte de crédit', 'Espèces', 'Chèque']),
            'idClient' => \App\Models\Client::factory(),
            'numeroFacture' => \App\Models\Facture::factory()
        ];
    }
}

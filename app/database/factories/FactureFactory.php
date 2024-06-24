<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    public function definition(): array
    {
        return [
            'etat' => fake()->randomElement(['annulée', 'payée', 'impayée','en attente de paiement']),
            'idDate' => \App\Models\OrderDate::factory(),
            'idLivreur' => \App\Models\Livreur::factory(),
            'idClient' => \App\Models\Client::factory()
        ];
    }
}
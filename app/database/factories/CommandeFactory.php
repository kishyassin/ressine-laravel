<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommandeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'etat' => fake()->randomElement(['prepared', 'delivered', 'cancelled']),
            'adresseLivraison' => fake()->unique()->address,
            'idDate' => \App\Models\OrderDate::factory(),
            'numeroFacture' => \App\Models\Facture::factory(),
            'idPlat' => \App\Models\Plat::factory(),
            'idLivreur' => \App\Models\Livreur::factory(),
            'idClient' => \App\Models\Client::factory()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommandeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'etat' => fake()->randomElement(['prepared', 'delivered', 'cancelled']),
            'adresseLivraison' => fake()->address,
            'idDate' => \App\Models\OrderDate::factory(),
            'numeroFacture' => \App\Models\Facture::factory(),
            'idPlat' => \App\Models\Plat::factory(),
            'prix_vente' => fake()->randomFloat(2, 5, 100),  // generates a random float between 5 and 100
            'quantite' => fake()->numberBetween(1, 10),     // generates a random integer between 1 and 10
        ];
    }
}
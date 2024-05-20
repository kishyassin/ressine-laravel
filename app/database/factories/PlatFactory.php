<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'imagePlat' => fake()->imageUrl(),
            'idCategorie' => \App\Models\Categorie::factory() // Assumes Categorie Factory exists and is linked properly.
        ];
    }
}

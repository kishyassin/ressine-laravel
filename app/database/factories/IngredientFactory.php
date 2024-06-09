<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'libelle'=>fake()->unique()->word(),
            'quantite'=>fake()->randomFloat()
        ];
    }
}


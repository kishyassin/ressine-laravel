<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idIngredient' => fake()->unique()->numberBetween(1, 1000),
            'libelle'=>fake()->unique()->text(),
            'quantite'=>fake()->randomFloat()
        ];
    }
}


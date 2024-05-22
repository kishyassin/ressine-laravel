<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'imagePlat' => fake()->imageUrl(),
            'idCategorie' =>fake()->numberBetween(1,3),
            'designationPlat'=>fake()->unique()->text(),
            'descriptionPlat'=>fake()->paragraph(),
            'prixUnitaire'=>fake()->numberBetween(1, 99),
            'etoiles'=>fake()->numberBetween(1, 5),
        ];
    }
}

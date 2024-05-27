<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idCategorie' =>fake()->numberBetween(1,3),
            'designationPlat' => fake()->unique()->words($nb = rand(3, 4), $asText = true),
            'descriptionPlat'=>fake()->paragraph(),
            'prixUnitaire'=>fake()->numberBetween(1, 99),
        ];
    }
}

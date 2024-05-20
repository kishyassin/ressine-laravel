<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComposerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idPlat' => \App\Models\Plat::factory(),
            'idIngredient' => \App\Models\Ingredient::factory()
        ];
    }
}

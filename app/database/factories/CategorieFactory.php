<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    protected $model = Categorie::class;

    public function definition()
    {
        return [
            'designation' => $this->faker->text(),
            'description' => $this->faker->sentence(),
            'iconCategorie' => 'fas fa-utensils', // Example Font Awesome icon class
        ];
    }
}

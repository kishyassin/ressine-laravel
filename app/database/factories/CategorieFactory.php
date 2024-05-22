<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    protected $model = Categorie::class;

    public function definition()
    {
        return [];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Categorie $categorie) {
    //         // Manually set the IDs for the specific records
    //         if ($categorie->idCategorie === null) {
    //             $categorie->idCategorie = fake()->randomElement([1, 2, 3]);
    //         }
    //     });
    // }
}

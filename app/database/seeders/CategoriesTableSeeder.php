<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Categorie::insert([
            ['idCategorie' => 1, 'designation' => 'petit déjeuner ', 'description' => 'Premier repas de la journée, généralement léger, souvent composé de café, pain, confiture et/ou céréales.'],
            ['idCategorie' => 2, 'designation' => 'déjeuner', 'description' => 'Repas principal pris en milieu de journée, souvent consistant et comprenant plusieurs plats.'],
            ['idCategorie' => 3, 'designation' => 'dîner', 'description' => 'Repas du soir, généralement plus léger que le déjeuner, pouvant inclure une soupe, une salade ou un plat principal simple.'],
        ]);
    }
}


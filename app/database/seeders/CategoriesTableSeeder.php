<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Create three categories with specific IDs
        Categorie::factory()->create(['idCategorie' => 1]);
        Categorie::factory()->create(['idCategorie' => 2]);
        Categorie::factory()->create(['idCategorie' => 3]);
    }
}

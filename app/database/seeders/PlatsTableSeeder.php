<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PlatsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('plats')->insert([
                'imagePlat' => $faker->imageUrl($width = 1366, $height = 770, 'food', true, 'Faker'),
                'idCategorie' => $faker->numberBetween(1, 3), // Assuming you have 10 categories
                'designationPlat' => $faker->word,
                'descriptionPlat' => $faker->sentence,
                'prixUnitaire' => $faker->randomFloat(2, 10, 99.99),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livreur;

class LivreursTableSeeder extends Seeder
{
    public function run()
    {
        Livreur::factory(10)->create();
    }
}

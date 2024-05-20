<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paiement;

class PaiementsTableSeeder extends Seeder
{
    public function run()
    {
        Paiement::factory(10)->create();
    }
}

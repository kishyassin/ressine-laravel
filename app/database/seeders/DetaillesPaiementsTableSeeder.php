<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetaillesPaiement;

class DetailsPaiementsTableSeeder extends Seeder
{
    public function run()
    {
        DetaillesPaiement::factory(10)->create();
    }
}

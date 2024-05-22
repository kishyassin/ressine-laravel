<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetaillesPaiement;

class DetaillesPaiementsTableSeeder extends Seeder
{
    public function run()
    {
        DetaillesPaiement::factory(10)->create();
    }
}

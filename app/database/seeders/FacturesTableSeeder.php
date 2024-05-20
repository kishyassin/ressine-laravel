<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facture;

class FacturesTableSeeder extends Seeder
{
    public function run()
    {
        Facture::factory(10)->create();
    }
}

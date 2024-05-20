<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plat;

class PlatsTableSeeder extends Seeder
{
    public function run()
    {
        Plat::factory(10)->create();
    }
}

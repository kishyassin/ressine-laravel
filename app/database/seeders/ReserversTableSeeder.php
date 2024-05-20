<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserver;

class ReserversTableSeeder extends Seeder
{
    public function run()
    {
        Reserver::factory(10)->create();
    }
}


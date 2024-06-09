<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Composer;

class ComposersTableSeeder extends Seeder
{
    public function run()
    {
        Composer::factory(100)->create();
    }
}


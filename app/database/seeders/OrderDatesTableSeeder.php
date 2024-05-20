<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDate;

class DatesTableSeeder extends Seeder
{
    public function run()
    {
        OrderDate::factory(10)->create();
    }
}

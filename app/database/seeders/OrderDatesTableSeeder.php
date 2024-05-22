<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDate;

class OrderDatesTableSeeder extends Seeder
{
    public function run()
    {
        OrderDate::factory(10)->create();
    }
}

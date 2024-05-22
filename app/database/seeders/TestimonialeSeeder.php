<?php

namespace Database\Seeders;

use App\Models\testimoniale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        testimoniale::factory(10)->create();

    }
}

<?php

namespace Database\Seeders;

use App\Models\Ecrire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EcrireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ecrire::factory(10)->create();

    }
}

<?php

namespace Database\Seeders;

use App\Models\Etoile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtoilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etoile::factory(10)->create();

    }
}

<?php
namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    public function run(): void
    {
        Chef::factory(10)->create();
    }
}

<?php

// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use App\Models\AboutImage;
use Illuminate\Database\Seeder;
use App\Models\About;
use App\Models\Stat;
use App\Models\Image;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $about = About::factory()->create();

        $about->images()->createMany(AboutImage::factory()->count(4)->make()->toArray());

        Service::factory()->count(3)->create();
    }
}

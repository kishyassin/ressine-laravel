<?php

// database/factories/ImageFactory.php
namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        $positions = ['left-full', 'left-small', 'right-small', 'right-full'];

        return [
            'url' => $this->faker->imageUrl(400, 400, 'food', true), // Generates a random image URL
            'position' => $this->faker->randomElement($positions),
        ];
    }
}

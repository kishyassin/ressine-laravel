<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    public function definition(): array
    {
        // Generate a unique idPlat value
        $idPlat = $this->faker->unique()->numberBetween(1, 25);

        // Check if the generated idPlat already exists in the database
        while (DB::table('images')->where('idPlat', $idPlat)->exists()) {
            // If it does, generate a new idPlat value until a unique one is found
            $idPlat = $this->faker->numberBetween(1, 25);
        }

        return [
            'idPlat' => $idPlat,
            'imageHero' => $this->faker->imageUrl(1370, 770, 'food', true, 'Faker'),
            'imageIcon' => $this->faker->imageUrl(200, 200, 'food', true, 'Faker'),
            'imageSlide' => $this->faker->imageUrl(320, 480, 'food', true, 'Faker'),
        ];
    }
}

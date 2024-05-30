<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idPlat' => fake()->unique()->numberBetween(1, 25),
            'imageHero' => fake()->imageUrl($width = 1370, $height = 770, 'food', true, 'Faker'),
            'imageIcon' => fake()->imageUrl($width = 200, $height = 200, 'food', true, 'Faker'),
            'imageSlide' => fake()->imageUrl($width = 320, $height = 480, 'food', true, 'Faker'),
        ];
    }
}

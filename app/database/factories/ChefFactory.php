<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChefFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nomChef' => fake()->unique()->lastName(),
            'prenomChef' => fake()->unique()->firstName(),
            'imageChef' => fake()->imageUrl(400,400, 'food', true, 'Faker'),
            'fonction' => fake()->jobTitle(),
            'facebook' => fake()->url(),
            'twitter' => fake()->url(),
            'instagram' => fake()->url(),
        ];
    }
}

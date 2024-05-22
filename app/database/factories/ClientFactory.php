<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->unique()->lastName,
            'imageClient' => fake()->imageUrl(),
            'prenom' => fake()->unique()->firstName,
            'telephone' =>substr(fake()->phoneNumber(), 0, 15),
            'adresse' => fake()->unique()->address
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    protected $model = About::class;

    public function definition()
    {
        return [
            'title' => 'À propos de nous',
            'welcome_text' => 'Bienvenue à Ressine',
            'description' => fake()->paragraph,
            'additional_info' => fake()->paragraph,
            'email' => fake()->email, // New field
            'address' => fake()->address, // New field
            'telephone' => fake()->phoneNumber, // New field
            'starting_year' => fake()->year($max = 'now')
        ];
    }
}

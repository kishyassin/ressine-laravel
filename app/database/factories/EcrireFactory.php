<?php

namespace Database\Factories;

use App\Models\Testimoniale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ecrire>
 */
class EcrireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idClient' => \App\Models\Client::factory(),
            'idDate' => \App\Models\OrderDate::factory(),
            'idTestimoniale' => testimoniale::factory(),
        ];
    }
}

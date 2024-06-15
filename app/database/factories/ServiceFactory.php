<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'icon' => $this->faker->randomElement(['fa-user-tie', 'fa-utensils', 'fa-cart-plus']),
        ];
    }
}

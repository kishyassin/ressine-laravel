<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'imageClient' => $this->faker->imageUrl(),
            'telephone' => substr($this->faker->phoneNumber(), 0, 15),
            'password' => Hash::make('password'), // Hash the password (you can use a more secure method)
            'email' => $this->faker->unique()->safeEmail, // Generate a unique email address
            'adresseClient' => $this->faker->unique()->address,
        ];
    }
}

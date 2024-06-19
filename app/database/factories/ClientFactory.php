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
            'nom' => $this->faker->unique()->lastName,
            'imageClient' => $this->faker->imageUrl(),
            'prenom' => $this->faker->unique()->firstName,
            'telephone' => substr($this->faker->phoneNumber(), 0, 15),
            'login' => $this->faker->unique()->userName, // Ensure login is unique
            'password' => Hash::make('password'), // Hash the password (you can use a more secure method)
            'email' => $this->faker->unique()->safeEmail, // Generate a unique email address
            'adresseClient' => $this->faker->unique()->address,
        ];
    }
}

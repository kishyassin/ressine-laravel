<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReserverFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idClient' => \App\Models\Client::factory(),
            'numeroTable' => \App\Models\Table::factory(),
            'idDate' => \App\Models\OrderDate::factory(),
            'idCategorie' =>\App\Models\Categorie::factory(),

        ];
    }
}

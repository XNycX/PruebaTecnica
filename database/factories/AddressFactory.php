<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'calle' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'puerta' => $this->faker->buildingNumber,
            'poblacion' => $this->faker->city,
        ];
    }
}

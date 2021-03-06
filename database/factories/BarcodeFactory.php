<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarcodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->ean13()
        ];
    }
}

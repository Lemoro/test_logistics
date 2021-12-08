<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LoadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name'   => $this->faker->myGoodsUa,
            'weight' => $this->faker->numberBetween(1, 30),
        ];

    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name'    => $this->faker->myCityUa . '-' . $this->faker->myCityUa,
            'load_id' => $this->faker->numberBetween(1, 20),
            'date'    => $this->faker->date,
        ];
    }
}

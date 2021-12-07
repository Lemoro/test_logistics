<?php

namespace Database\Factories;

use App\Library\Faker\City;
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

        $this->faker->addProvider(new City($this->faker));

        return [
            'name'    => $this->faker->myCityUa . '-' . $this->faker->myCityUa,
            'load_id' => $this->faker->numberBetween(1, 20),
            'date'    => $this->faker->date,
        ];
    }
}

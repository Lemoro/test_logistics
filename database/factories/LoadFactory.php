<?php

namespace Database\Factories;

use App\Library\Faker\Goods;
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

        $this->faker->addProvider(new Goods($this->faker));

        return [
            'name'   => $this->faker->myGoodsUa,
            'weight' => $this->faker->numberBetween(1, 30),
        ];

    }
}

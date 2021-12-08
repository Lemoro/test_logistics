<?php

namespace App\Providers;

use App\Library\Faker\City;
use App\Library\Faker\Goods;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->extend(Generator::class, function (Generator $faker, $app) {
            $faker->addProvider(new Goods($faker));
            $faker->addProvider(new City($faker));

            return $faker;
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

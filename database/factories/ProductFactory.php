<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker)
{    
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

    return [
        'name' => $faker->randomElement($categories = [
                    $faker->beverageName(),
                    $faker->dairyName(),
                    $faker->vegetableName(),
                    $faker->fruitName(),
                    $faker->meatName(),
                    $faker->sauceName()
                ]),
        'energy' => $faker->numberBetween($min = 0, $max = 500),
        'protein' => $faker->numberBetween($min = 0, $max = 25),
        'fat' => $faker->numberBetween($min = 0, $max = 12),
        'carbs' => $faker->numberBetween($min = 0, $max = 25),
        'quantity' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
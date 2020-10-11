<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        
        DB::table('products')
            ->insert([
                'name' => $faker->foodName(),
                'brand' => $faker->optional()->company(),
                'energy' => $faker->numberBetween($min = 0, $max = 1000),
                'protein' => $faker->numberBetween($min = 0, $max = 100),
                'fat' => $faker->numberBetween($min = 0, $max = 80),
                'carbs' => $faker->numberBetween($min = 0, $max = 120),
                'quantity' => $faker->numberBetween($min = 1, $max = 1000),
            ]);
    }
}

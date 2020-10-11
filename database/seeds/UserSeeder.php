<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'username' => 'demo',
                'email' => 'demo@example.com',
                'password' => 'demopass',
                'gender' => 'male',
                'age' => '30',
                'height' => '182',
                'current_weight' => '81',
                'activity_level' => '1.375',
            ]);
    }
}
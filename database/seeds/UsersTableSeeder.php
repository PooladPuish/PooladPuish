<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 1000; $i++) {
            \App\User::create([
                'name' => Str::random(10),
                'email' => Str::random(10),
                'password' => bcrypt('password'),

            ]);
        }


    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'phone' => '087123214124',
            'password' => bcrypt("12345678"),
            'role' => "admin",
        ]);

        User::create([
            'name' => "user",
            'email' => "user@gmail.com",
            'phone' => '08712512442',
            'password' => bcrypt("12345678"),
            'role' => "user",
        ]);
    }
}

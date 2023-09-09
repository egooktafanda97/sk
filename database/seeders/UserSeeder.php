<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::insert(
            [
                "name" => "admin",
                "email" => "admin@gmail.com",
                "password" =>  bcrypt('password')
            ],
            [
                "name" => "guru1",
                "email" => "guru1@gmail.com",
                "password" =>  bcrypt('password')
            ],
            [
                "name" => "guru2",
                "email" => "guru2@gmail.com",
                "password" =>  bcrypt('password')
            ]
        );
    }
}

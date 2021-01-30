<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'developer',
            'email' => 'developer@mail.com',
            'password' =>  Hash::make('1234qwer'),
            'user_type' => 'Developer',
        ]);
        DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@mail.com',
            'password' => Hash::make('1234qwer'),
            'user_type' => 'Client',
        ]);

        DB::statement("INSERT INTO `categories` (`category_id`, `category_name`) VALUES
            (1, 'Games'),
            (2, 'Sports'),
            (3, 'Finance'),
            (4, 'Tools'),
            (5, 'Music'),
            (6, 'Social')
        ");
    }
}

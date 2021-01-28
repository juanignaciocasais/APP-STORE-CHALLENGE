<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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

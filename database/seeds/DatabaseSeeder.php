<?php

use Illuminate\Database\Seeder;
use Database\Seeds\UsersTableSeeder;
use Database\Seeds\ReportsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
//        $this->call(ReportsTableSeeder::class);
    }
}

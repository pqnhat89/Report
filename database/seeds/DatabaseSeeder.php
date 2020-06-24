<?php

use Illuminate\Database\Seeder;
use Database\Seeds\UsersTableSeeder;
use Database\Seeds\SkssB4TableSeeder;
use Database\Seeds\QuanHuyenTableSeeder;

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
        $this->call(QuanHuyenTableSeeder::class);
        $this->call(SkssB4TableSeeder::class);
    }
}

<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Admin',
                    'email' => 'pqnhat89@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 1,
                    'quan_huyen' => 0,
                ],
                [
                    'name' => 'Đà Nẵng',
                    'email' => 'danang@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 1,
                    'quan_huyen' => 0,
                ],
                [
                    'name' => 'Hải Châu',
                    'email' => 'haichau@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 0,
                    'quan_huyen' => 1,
                ],
                [
                    'name' => 'Cẩm Lệ',
                    'email' => 'camle@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 0,
                    'quan_huyen' => 2,
                ],
                [
                    'name' => 'Thanh Khê',
                    'email' => 'thanhkhe@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 0,
                    'quan_huyen' => 3
                ]
            ]
        );
    }
}

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
                    'role' => 2,
                    'quan_huyen' => 1,
                ],
                [
                    'name' => 'Thành Phố',
                    'email' => 'tp@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 2,
                    'quan_huyen' => 2,
                ],
                [
                    'name' => 'Quận Huyện',
                    'email' => 'qh@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 1,
                    'quan_huyen' => 3,
                ],
                [
                    'name' => 'Người mới',
                    'email' => 'nm@gmail.com',
                    'password' => bcrypt('123'),
                    'role' => 0,
                    'quan_huyen' => 4
                ]
            ]
        );
    }
}

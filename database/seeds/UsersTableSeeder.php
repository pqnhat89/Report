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
        $users = [
            'pqnhat89@gmail.com' => 'Admin',
            'danang@gmail.com' => 'Đà Nẵng',
            'haichau@gmail.com' => 'Hải Châu',
            'camle@gmail.com' => 'Cẩm Lệ',
            'thanhkhe@gmail.com' => 'Thanh Khê',
            'lienchieu@gmail.com' => 'Liên Chiểu',
            'nguhanhson@gmail.com' => 'Ngũ Hành Sơn',
            'sontra@gmail.com' => 'Sơn Trà',
            'hoavang@gmail.com' => 'Hòa Vang',
            'hoangsa@gmail.com' => 'Hoàng Sa',
        ];

        $data = [];
        $i = 0;

        foreach ($users as $email => $name) {
            $data[] = [
                'name' => $name,
                'email' => $email,
                'password' => bcrypt('123'),
                'role' => $i > 1 ? 0 : 1,
                'quan_huyen' => $i - 1 < 0 ? 0 : $i - 1,
            ];
            $i = $i + 1;
        }

        DB::table('users')->insert($data);
    }
}

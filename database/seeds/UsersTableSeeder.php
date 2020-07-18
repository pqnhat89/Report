<?php

namespace Database\Seeds;

use App\Enums\Locations;
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
        $admins = [
            'pqnhat89@gmail.com',
            'danang@gmail.com',
        ];

        $users = [
            'phusan@gmail.com',
            'bvdanang@gmail.com',
            'ttksbt@gmail.com',
            'bvphunu@gmail.com',

            'haichau@gmail.com',
            'thanhkhe@gmail.com',
            'sontra@gmail.com',
            'lienchieu@gmail.com',
            'nguhanhson@gmail.com',
            'camle@gmail.com',
            'hoavang@gmail.com',

            'bvhoanmy@gmail.com',
            'bvgiadinh@gmail.com',
            'bvtamtri@gmail.com',
            'bvbinhdan@gmail.com',
            'bvvinmec@gmail.com'
        ];
        $data = [];
        foreach ($admins as $k => $admin) {
            $data[] = [
                'name' => $admin,
                'email' => $admin,
                'password' => bcrypt('123'),
                'role' => 1,
                'location' => null,
            ];
        }

        $locations = Locations::toArray();
        $i = 0;
        foreach ($locations as $locations) {
            $data[] = [
                'name' => $users[$i],
                'email' => $users[$i],
                'password' => bcrypt('123'),
                'role' => 0,
                'location' => $locations,
            ];
            $i++;
        }

        DB::table('users')->insert($data);
    }
}

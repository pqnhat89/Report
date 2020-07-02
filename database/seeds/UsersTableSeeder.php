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
        $users = [
            'pqnhat89@gmail.com',
            'danang@gmail.com',
            'haichau@gmail.com',
            'camle@gmail.com',
            'thanhkhe@gmail.com',
            'lienchieu@gmail.com',
            'nguhanhson@gmail.com',
            'sontra@gmail.com',
            'hoavang@gmail.com',
            'hoangsa@gmail.com'
        ];
        $locations = Locations::toArray();

        $data = [];
        $i = 0;

        foreach ($locations as $location) {
            if ($i < count($users)) {
                $data[] = [
                    'name' => $users[$i],
                    'email' => $users[$i],
                    'password' => bcrypt('123'),
                    'role' => $i > 1 ? 0 : 1,
                    'location' => $location,
                ];
                $i = $i + 1;
            }
        }
        DB::table('users')->insert($data);
    }
}

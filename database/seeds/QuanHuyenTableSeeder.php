<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuanHuyenTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quan_huyen')->insert(
            [
                [
                    'name' => 'Quận Hải Châu'
                ],
                [
                    'name' => 'Quận Cẩm Lệ'
                ],
                [
                    'name' => 'Quận Thanh Khê'
                ],
                [
                    'name' => 'Quận Liên Chiểu'
                ],
                [
                    'name' => 'Quận Ngũ Hành Sơn'
                ],
                [
                    'name' => 'Quận Sơn Trà'
                ],
                [
                    'name' => 'Huyện Hòa Vang'
                ],
                [
                    'name' => 'Huyện Hoàng Sa'
                ]
            ]
        );
    }
}

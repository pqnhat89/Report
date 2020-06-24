<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkssB4TableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skss_b4')->insert(
            [
                [
                    'nam' => 2020,
                    'thang' => '3-thang',
                    'quan-huyen' => 1,
                    'ten' => 'Báo cáo sức khỏe sinh sản - 3 tháng',
                    'email' => 'pqnhat89@gmail.com',
                    'one' => 1,
                    'onedotone' => 11,
                    'two' => 2,
                    'twodotone' => 21,
                    'three' => 3,
                    'threedotone' => 31,
                    'threedottwo' => 32,
                    'threedotthree' => 33,
                    'threedotfour' => 34,
                    'threedotfive' => 35,
                    'threedotsix' => 36,
                    'threedotseven' => 37,
                    'threedoteight' => 38,
                    'threedotnine' => 39,
                    'threedotten' => 310,
                    'four' => 4,
                    'five' => 5,
                    'six' => 6,
                    'sixdotone' => 61,
                    'sixdottwo' => 62,
                    'seven' => 7
                ]
            ]
        );
    }
}

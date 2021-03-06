<?php

namespace Database\Seeds;

use App\Enums\FileNames;
use App\Enums\Types;
use App\Enums\Months;
use App\Enums\UserRole;
use App\Enums\Locations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $locations = Locations::toArray();
        $months = Months::monthsOfYear();
        $types = array_merge(Types::toArray(), []);
//        $types = array_merge(Types::toArray(), FileNames::toArray());
        $datas = [];
        foreach ($types as $type) {
            foreach ($locations as $location) {
                foreach ($months as $month) {
                    $data = [
                        'type' => $type,
                        'year' => rand(2019, 2020),
                        'month' => $month,
                        'location' => $location
                    ];
                    for ($i = 0; $i <= 100; $i++) {
                        $data[\PHPExcel_Cell::stringFromColumnIndex($i)] = rand(1, 100);
                    }
                    $datas[] = $data;
                }
            }
        }
        $datas = array_chunk($datas, 100);
        foreach ($datas as $data) {
            DB::table('reports')->insert($data);
        }
    }
}

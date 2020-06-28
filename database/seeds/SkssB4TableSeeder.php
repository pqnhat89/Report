<?php

namespace Database\Seeds;

use App\Enums\LoaiBaoCao;
use App\Enums\UserRole;
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
        $users = DB::table('users')
            ->where('role', UserRole::NormalUser)
            ->get();
        $loais = LoaiBaoCao::toArray();
        $nam = now()->format('Y');
        $data = [];

        foreach ($users as $user) {
            foreach ($loais as $loai) {
                $data[] = [
                    'nam' => $nam,
                    'loai' => $loai,
                    'quan_huyen' => $user->quan_huyen,
                    'one' => rand(1, 100),
                    'onedotone' => rand(1, 100),
                    'two' => rand(1, 100),
                    'twodotone' => rand(1, 100),
                    'three' => rand(1, 100),
                    'threedotone' => rand(1, 100),
                    'threedottwo' => rand(1, 100),
                    'threedotthree' => rand(1, 100),
                    'threedotfour' => rand(1, 100),
                    'threedotfive' => rand(1, 100),
                    'threedotsix' => rand(1, 100),
                    'threedotseven' => rand(1, 100),
                    'threedoteight' => rand(1, 100),
                    'threedotnine' => rand(1, 100),
                    'threedotten' => rand(1, 100),
                    'four' => rand(1, 100),
                    'five' => rand(1, 100),
                    'six' => rand(1, 100),
                    'sixdotone' => rand(1, 100),
                    'sixdottwo' => rand(1, 100),
                    'seven' => rand(1, 100),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'created_by' => $user->email,
                    'updated_by' => $user->email
                ];
            }
        }

        DB::table('skss_b4')->insert($data);
    }
}

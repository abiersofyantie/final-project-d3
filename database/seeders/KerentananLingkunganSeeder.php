<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KerentananLingkunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [1, 1, 265, 0, 3, 6.811],
            [2, 2, 16389, 210, 0, 0],
            [3, 3, 17620, 0, 5, 1.404],
            [4, 4, 9081, 0, 4, 215],
            [5, 5, 12754, 0, 0, 26],
            [6, 6, 8153, 477, 0, 0],
            [7, 7, 41492, 22031, 11, 11099],
            [8, 8, 12652, 23295, 4, 0],
            [9, 9, 45139, 47694, 4, 210],
            [10, 10, 57079, 63115, 21, 0],
            [11, 11, 30757, 1538, 0, 0],
            [12, 12, 19716, 31238, 20, 1827],
            [13, 13, 23176, 9961, 33, 6344],
            [14, 14, 6966, 9937, 11, 1128],
            [15, 15, 0, 0, 6, 1015],
            [16, 16, 4254, 11276, 0, 2],
            [17, 17, 620, 2765, 0, 0],
            [18, 18, 7554, 0, 0, 886],
            [19, 19, 5828, 19, 0, 62],
            [20, 20, 3987, 0, 0, 0],
            [21, 21, 2992, 0, 0, 611],
            [22, 22, 1457, 0, 0, 20.02],
            [23, 23, 336, 2, 20, 3.984],
            [24, 24, 225, 0, 6, 4.732],
            [25, 25, 0, 4548, 28, 0],
            [26, 26, 600, 0, 41, 320],
            [27, 27, 0, 0, 14, 5.228],
            [28, 28, 373, 0, 16, 353],
            [29, 29, 11925, 513, 77, 705],
            [30, 30, 12, 0, 0, 2],
            [31, 31, 0, 0, 0, 0],
            [32, 32, 0, 0, 0, 0],
            [33, 33, 0, 0, 4, 0],
            [34, 34, 0, 0, 5, 0],
            [35, 35, 0, 0, 0, 0],
            [36, 36, 0, 0, 0, 0],
            [37, 37, 0, 0, 11, 34],
            [38, 38, 3340, 5013, 0, 0]
        ];

        foreach ($data as $kerentanan_lingkungan) {
            DB::table('kerentanan_lingkungan')->insert([
                'id' => $kerentanan_lingkungan[0],
                'kabupaten_id' => $kerentanan_lingkungan[1],
                'hutan_lindung' => $kerentanan_lingkungan[2],
                'hutan_alam' => $kerentanan_lingkungan[3],
                'hutan_bakau' => $kerentanan_lingkungan[4],
                'semak_belukar' => $kerentanan_lingkungan[5],
                'hasil_kerenling' => ((0.4 * (float) $kerentanan_lingkungan[2]) +(0.4 * (float) $kerentanan_lingkungan[3]) + (0.1 * (float) $kerentanan_lingkungan[4])+ (0.1 * (float) $kerentanan_lingkungan[4]))
            ]);
        }
    }

}

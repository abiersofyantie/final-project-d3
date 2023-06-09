<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KerentananEkonomiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [1, 1, 43.07, 10837.87],
            [2, 2, 58.38, 14168.62],
            [3, 3, 55.08, 12502.39],
            [4, 4, 60.89, 26455.76],
            [5, 5, 57.38, 24945.46],
            [6, 6, 59.95, 28490.95],
            [7, 7, 58.4, 66545.47],
            [8, 8, 52.91, 21933.79],
            [9, 9, 48.72, 52586.56],
            [10, 10, 54.33, 53295.11],
            [11, 11, 48.61, 13451.77],
            [12, 12, 51.79, 13282.84],
            [13, 13, 52.43, 22898.24],
            [14, 14, 51.18, 103152.80],
            [15, 15, 65.86, 135305.32],
            [16, 16, 57.63, 57818.42],
            [17, 17, 61.89, 27657.58],
            [18, 18, 61.96, 17990.36],
            [19, 19, 61.4, 12939.58],
            [20, 20, 66.67, 13020.89],
            [21, 21, 65.71, 13479.74],
            [22, 22, 53.9, 69703.42],
            [23, 23, 56.35, 42705.01],
            [24, 24, 59.67, 26972.65],
            [25, 25, 61.68, 97616.60],
            [26, 26, 49.23, 17514.62],
            [27, 27, 50.56, 13953.74],
            [28, 28, 50.43, 11117.62],
            [29, 29, 54.5, 23546.51],
            [30, 30, 56.94, 84374.98],
            [31, 31, 67.64, 4722.55],
            [32, 32, 67.58, 51154.53],
            [33, 33, 52.13, 8035.27],
            [34, 34, 60.35, 5706.60],
            [35, 35, 63.42, 4801.46],
            [36, 36, 62.43, 10262.44],
            [37, 37, 57.33, 390936.43],
            [38, 38, 66.84, 11025.81],
        ];

        foreach ($data as $kerentanan_ekonomi) {
            DB::table('kerentanan_ekonomi')->insert([
                'id' => $kerentanan_ekonomi[0],
                'kabupaten_id' => $kerentanan_ekonomi[1],
                'luas_lahan_produktif' => $kerentanan_ekonomi[2],
                'luas_pdrb' => $kerentanan_ekonomi[3],
                'hasil_kereneko' => ((0.6 * (float) $kerentanan_ekonomi[2]) +(0.4 * (float) $kerentanan_ekonomi[3])),
            ]);
        }
    }
}


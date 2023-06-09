<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndeksKapasitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $data = [
        [1, 1, 0.033],
        [2, 2, 0.033],
        [3, 3, 0.033],
        [4, 4, 0.033],
        [5, 5, 0.033],
        [6, 6, 0.033],
        [7, 7, 0.033],
        [8, 8, 0.033],
        [9, 9, 0.033],
        [10, 10, 0],
        [11, 11, 0.033],
        [12, 12, 0.033],
        [13, 13, 0.033],
        [14, 14, 0.033],
        [15, 15, 0],
        [16, 16, 0],
        [17, 17, 0.033],
        [18, 18, 0.033],
        [19, 19, 0.033],
        [20, 20, 0.033],
        [21, 21, 0.033],
        [22, 22, 0.033],
        [23, 23, 0.033],
        [24, 24, 0],
        [25, 25, 0.033],
        [26, 26, 0.033],
        [27, 27, 0.033],
        [28, 28, 0],
        [29, 29, 0.033],
        [30, 30, 0.033],
        [31, 31, 0.033],
        [32, 32, 0],
        [33, 33, 0],
        [34, 34, 0],
        [35, 35, 0.033],
        [36, 36, 0.033],
        [37, 37, 0.033],
        [38, 38, 0.033]
    ];

        foreach ($data as $indeks_kapasitas) {
            DB::table('indeks_kapasitas')->insert([
            'id' => $indeks_kapasitas[0],
            'kabupaten_id' => $indeks_kapasitas[1],
            'skor' => $indeks_kapasitas[2]
        ]);
    }
}
}

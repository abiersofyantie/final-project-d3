<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KerentananFisikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $data = [
        [1, 1, 155735, 968, 975],
        [2, 2, 24593, 126, 1280],
        [3, 3, 199132, 989, 989],
        [4, 4, 291492, 212, 1452],
        [5, 5, 332532, 144, 1637],
        [6, 6, 422831, 278, 2062],
        [7, 7, 705228, 398, 2997],
        [8, 8, 289568, 185, 1373],
        [9, 9, 697885, 139, 3088],
        [10, 10, 482195, 109, 2495],
        [11, 11, 254143, 28, 1122],
        [12, 12, 217779, 996, 968],
        [13, 13, 328108, 90, 1390],
        [14, 14, 440825, 228, 2201],
        [15, 15, 590137, 171, 2217],
        [16, 16, 295837, 74, 1399],
        [17, 17, 334678, 269, 1981],
        [18, 18, 292228, 237, 1595],
        [19, 19, 201643, 1032, 1006],
        [20, 20, 17569, 1003, 1022],
        [21, 21, 251258, 196, 1427],
        [22, 22, 343838, 404, 1856],
        [23, 23, 316938, 329, 1791],
        [24, 24, 304699, 268, 2069],
        [25, 25, 329678, 131, 1727],
        [26, 26, 231448, 231, 1408],
        [27, 27, 239208, 219, 1283],
        [28, 28, 225617, 1202, 1207],
        [29, 29, 327167, 163, 1831],
        [30, 30, 74612, 360, 401],
        [31, 31, 37659, 176, 187],
        [32, 32, 232757, 690, 777],
        [33, 33, 60173, 228, 252],
        [34, 34, 49917, 299, 326],
        [35, 35, 3784, 178, 197],
        [36, 36, 49645, 284, 310],
        [37, 37, 78973, 122, 3229],
        [38, 38, 53972, 211, 216],
    ];

    foreach ($data as $kerentanan_fisik) {
        DB::table('kerentanan_fisik')->insert([
            'id' => $kerentanan_fisik[0],
            'kabupaten_id' => $kerentanan_fisik[1],
            'rumah' => $kerentanan_fisik[2],
            'fasilitas_umum' => $kerentanan_fisik[3],
            'fasilitas_kritis' => $kerentanan_fisik[4],
            'hasil_kerenfis' => ((0.4 * (float) $kerentanan_fisik[2]) +(0.3 * (float) $kerentanan_fisik[3]) + (0.3* (float) $kerentanan_fisik[4]))
        ]);
    }
}
}

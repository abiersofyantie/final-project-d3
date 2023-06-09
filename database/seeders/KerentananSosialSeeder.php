<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KerentananSosialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $data = [
        [1, 423.84, 95.41, 1.84, 0.1, 48.8],
        [2, 732.05, 99.93, 1.97, 0.11, 49.98],
        [3, 640.58, 98.76, 1.86, 0.08, 49.68],
        [4, 1038.78, 95.12, 1.72, 0.08, 48.74],
        [5, 921.09, 100.39, 2.46, 0.07, 50.09],
        [6, 1186.39, 100.74, 4.03, 0.07, 50.18],
        [7, 755.75, 101.05, 6.05, 0.05, 50.25],
        [8, 629.35, 95.4, 2.3, 0.06, 48.82],
        [9, 824.73, 96.67, 5.62, 0.04, 49.14],
        [10, 297.19, 99.04, 2.86, 0.05, 49.75],
        [11, 510.18, 94.94, 2.52, 0.1, 48.69],
        [12, 412.21, 95.24, 1.9, 0.07, 48.75],
        [13, 681.46, 95.3, 4.88, 0.1, 48.78],
        [14, 1093.48, 98.19, 3.49, 0.07, 49.53],
        [15, 3297.6, 100.97, 3, 0.05, 50.24],
        [16, 1567.95, 99.79, 2.64, 0.08, 49.95],
        [17, 1189.06, 99.01, 2.78, 0.09, 49.73],
        [18, 906.42, 98.86, 2.75, 0.08, 49.7],
        [19, 722.97, 97.47, 1.78, 0.09, 49.33],
        [20, 978.65, 94.92, 1.48, 0.1, 48.71],
        [21, 673.89, 95.68, 2.86, 0.08, 48.88],
        [22, 594.69, 97.79, 3.64, 0.1, 49.43],
        [23, 655.96, 97.62, 4.21, 0.09, 49.38],
        [24, 760.94, 94.46, 3.65, 0.11, 49.56],
        [25, 1108.56, 98.33, 3.64, 0.07, 49.57],
        [26, 1070.17, 91.46, 4.72, 0.08, 47.76],
        [27, 791.53, 95.06, 5.19, 0.07, 48.68],
        [28, 1077.33, 94.58, 3, 0.08, 48.5],
        [29, 565.32, 90.72, 4.91, 0.11, 47.55],
        [30, 4541.99, 99.45, 0.49, 0.04, 49.82],
        [31, 4616.86, 98.34, 0.25, 0.04, 49.6],
        [32, 5815.89, 97.3, 0.89, 0.02, 49.3],
        [33, 4256.26, 97.06, 0.39, 0.04, 49.28],
        [34, 5937.32, 98.29, 0.31, 0.04, 49.58],
        [35, 6594.36, 96.75, 0.18, 0.04, 49.17],
        [36, 5805.34, 93.74, 0.2, 0.04, 48.35],
        [37, 8216.71, 97.64, 3.33, 0.02, 49.38],
        [38, 1569.79, 101.16, 0.19, 0.04, 50.33],
    ];

    foreach ($data as $row) {
        $rowData = [

        ];

        DB::table('your_table_name')->insert($rowData);
    }

    foreach ($data as $kerentanan_sosial) {
            DB::table('kerentanan_sosial')->insert([
            'id' => $kerentanan_sosial[0],
            'kabupaten_id' => $kerentanan_sosial[0],
            'kepadatan_penduduk' => $kerentanan_sosial[1],
            'rasio_jenis_kelamin' => $kerentanan_sosial[2],
            'rasio_kemiskinan' => $kerentanan_sosial[3],
            'rasio_orang_cacat' => $kerentanan_sosial[4],
            'rasio_kelompok_umur' => $kerentanan_sosial[5],
            'hasil_kerensos' => ((0.6 * (float) $kerentanan_sosial[1]) +(0.1 * (float) $kerentanan_sosial[2]) + (0.1* (float) $kerentanan_sosial[3]) + (0.1 * (float) $kerentanan_sosial[4]) + (0.1 * (float) $kerentanan_sosial[5])),
            ]);
        }
}
}

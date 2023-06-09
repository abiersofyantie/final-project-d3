<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuzzyAhpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_kabupaten_fuzzy = [
            ['id_kabupaten' => 1],
            ['id_kabupaten' => 2],
            ['id_kabupaten' => 3],
            ['id_kabupaten' => 4],
            ['id_kabupaten' => 5],
            ['id_kabupaten' => 6],
            ['id_kabupaten' => 7],
            ['id_kabupaten' => 8],
            ['id_kabupaten' => 9],
            ['id_kabupaten' => 10],
            ['id_kabupaten' => 11],
            ['id_kabupaten' => 12],
            ['id_kabupaten' => 13],
            ['id_kabupaten' => 14],
            ['id_kabupaten' => 15],
            ['id_kabupaten' => 16],
            ['id_kabupaten' => 17],
            ['id_kabupaten' => 18],
            ['id_kabupaten' => 19],
            ['id_kabupaten' => 20],
            ['id_kabupaten' => 21],
            ['id_kabupaten' => 22],
            ['id_kabupaten' => 23],
            ['id_kabupaten' => 24],
            ['id_kabupaten' => 25],
            ['id_kabupaten' => 26],
            ['id_kabupaten' => 27],
            ['id_kabupaten' => 28],
            ['id_kabupaten' => 29],
            ['id_kabupaten' => 30],
            ['id_kabupaten' => 31],
            ['id_kabupaten' => 32],
            ['id_kabupaten' => 33],
            ['id_kabupaten' => 34],
            ['id_kabupaten' => 35],
            ['id_kabupaten' => 36],
            ['id_kabupaten' => 37],
            ['id_kabupaten' => 38]
        ];

        DB::table('fuzzy_ahps')->insert($data_kabupaten_fuzzy);
    }
}

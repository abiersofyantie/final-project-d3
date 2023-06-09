<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [1, 1, 'Kec. Tulakan Ds. Ngumbul', 0.33, '10/31/2021'],
            [2, 2, 'Kec. Ngrayun Ds. Baosan Kidul', 0.67, '11/17/2021'],
            [3, 3, 'Kec. Dongko Ds. Dawung', 0.67, '11/24/2021'],
            [4, 4, 'Kec. Sendang Ds. Nglurup', 0, '11/23/2021'],
            [5, 5, 'Kec. Panggungrejo Ds. Kalitengah Kec. Doko Ds. Resapombo', 0, '11/28/2021'],
            [6, 6, 'Kec. Mojo Ds. Blimbing', 0, '1/2/2022'],
            [7, 7, 'Kec. Kepanjen Kec. Dampit', 0.33, '11/21/2021'],
            [8, 8, 'Kec. Candipuro Ds. Sumber Wuluh', 0.33, '9/11/2022'],
            [9, 9, 'Kec. Patrang Kel. Bintoro', 0.67, '2/28/2021'],
            [10, 10, 'Kec. Kalibaru Ds. Kebunrejo', 0, '3/21/2022'],
            [11, 11, 'Tidak ada kejadian', 0, '12/12/2020'],
            [12, 12, 'Kec. Arjasa Ds. Bayeman', 0.33, '11/28/2021'],
            [13, 13, 'Kec. Sukapura Ds. Wonokerto', 0.33, '11/24/2021'],
            [14, 14, 'Kec. Tosari Ds. Kandangan', 0, '1/11/2022'],
            [15, 15, 'Tidak ada kejadian', 0, '12/12/2020'],
            [16, 16, 'Tidak ada kejadian', 0, '12/12/2020'],
            [17, 17, 'Tidak ada kejadian', 0, '12/12/2020'],
            [18, 18, 'Kec. Sawahan Ds. Sidorejo', 0.67, '5/23/2021'],
            [19, 19, 'Kec. Gemarang Ds. Batok', 0, '11/27/2021'],
            [20, 20, 'Kec. Poncol Ds. Gonggang', 0.33, '6/13/2022'],
            [21, 21, 'Tidak ada kejadian', 0, '12/12/2020'],
            [22, 22, 'Kec. Baureno Ds. Pucangarum Kec. Kanor Ds. Temu Tanggul Kali Ingas', 0, '1/21/2022'],
            [23, 23, 'Kec. Semanding Ds. Ngino', 0, '1/3/2021'],
            [24, 24, 'Tidak ada kejadian', 0, '12/12/2020'],
            [25, 25, 'Tidak ada kejadian', 0, '12/12/2020'],
            [26, 26, 'Tidak ada kejadian', 0, '12/12/2020'],
            [27, 27, 'Tidak ada kejadian', 0, '12/12/2020'],
            [28, 28, 'Kec. Palengaan Ds. Banyupelle', 0, '3/16/2021'],
            [29, 29, 'Tidak ada kejadian', 0, '12/12/2020'],
            [30, 30, 'Kec. Mojo Ds. Blimbing', 0, '1/2/2022'],
            [31, 31, 'Kec. Selorejo Ds. Sumberagung Ds. Selorejo Ds. Pohgajih', 0, '12/16/2022'],
            [32, 32, 'Kec. Blimbing Kel. Jodipan', 0, '11/26/2022'],
            [33, 33, 'Kec. Sukapura Ds. Wonokerto', 0, '11/24/2021'],
            [34, 34, 'Kec. Puspo Ds. Puspo', 0, '12/28/2022'],
            [35, 35, 'Tidak ada kejadian', 0, '12/12/2020'],
            [36, 36, 'Kec. Gemarang Ds. Batok', 0.33, '11/27/2021'],
            [37, 37, 'Tidak ada kejadian', 0, '12/12/2020'],
            [38, 38, 'Kec. Bumiaji Ds. Sumberbrantas', 0.33, '10/15/2022'],
        ];

        foreach ($data as $bencana) {
            DB::table('bencana')->insert([
                'id' => $bencana[0],
                'kabupaten_id' => $bencana[1],
                'alamat_bencana' => $bencana[2],
                'gerakan_tanah' => $bencana[3],
                'tanggal_bencana' => Carbon::createFromFormat('m/d/Y', $bencana[4]),
                'waktu_bencana' => Carbon::createFromTime(rand(0, 23), rand(0, 59), rand(0, 59)),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\IndeksKapasitas;
use App\Models\KerentananEkonomi;
use App\Models\KerentananFisik;
use App\Models\KerentananLingkungan;
use App\Models\KerentananSosial;
use Database\Factories\BencanaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BencanaFactory::times(50)->create();



        // seed one to one relationship table with kabupaten
        foreach (range(1, 38) as $index) {

            IndeksKapasitas::create([
                'kabupaten_id' => $index,
                'skor' => fake()->randomFloat(2, 0, 1),
            ]);

            $kerentanan = KerentananSosial::create([
                'kabupaten_id' => $index,
                'kepadatan_penduduk' => fake()->randomFloat(2, 300, 2000),
                'rasio_jenis_kelamin' => fake()->randomFloat(2, 95, 110),
                'rasio_kemiskinan' => fake()->randomFloat(2, 1, 3),
                'rasio_orang_cacat' => fake()->randomFloat(2, 0.01, 0.3),
                'rasio_kelompok_umur' =>  fake()->randomFloat(2, 40, 50),
            ]);
            $total = ((0.6 * (float) $kerentanan->kepadatan_penduduk) +(0.1 * (float) $kerentanan->rasio_jenis_kelamin) + (0.1 * (float) $kerentanan->rasio_kemiskinan) + (0.1 * (float) $kerentanan->rasio_orang_cacat) + (0.1 * (float) $kerentanan->rasio_kelompok_umur));
            $kerentanan->hasil_kerensos = $total;
            $kerentanan->save();

            $kerentanan = KerentananEkonomi::create([
                'kabupaten_id' => $index,
                'luas_lahan_produktif' => fake()->randomNumber(5),
                'luas_pdrb' => fake()->randomFloat(2, 10000, 80000),
            ]);
            $total = ((0.6 * (float) $kerentanan->luas_lahan_produktif) +(0.4 * (float) $kerentanan->luas_pdrb));
            $kerentanan->hasil_kereneko = $total;
            $kerentanan->save();

            $kerentanan = KerentananFisik::create([
                'kabupaten_id' => $index,
                'rumah' => fake()->randomNumber(6),
                'fasilitas_umum' => fake()->randomNumber(3),
                'fasilitas_kritis' => fake()->randomNumber(4),
            ]);
            $total = ((0.4 *  $kerentanan->rumah) + (0.3 *  $kerentanan->fasilitas_umum) + (0.3 * $kerentanan->fasilitas_kritis));
            $kerentanan->hasil_kerenfis = $total;
            $kerentanan->save();

            $kerentanan = KerentananLingkungan::create([
                'kabupaten_id' => $index,
                'hutan_lindung' => fake()->randomNumber(3),
                'hutan_alam' => fake()->randomNumber(4),
                'hutan_bakau' => fake()->randomNumber(6),
                'semak_belukar' => fake()->randomNumber(6),
            ]);
            $total = ((0.4 * (float) $kerentanan->hutan_lindung) + (0.4 * (float) $kerentanan->hutan_alam) + (0.1 * (float) $kerentanan->hutan_bakau) + (0.1 * (float) $kerentanan->hutan_belukar));
            $kerentanan->hasil_kerenling = $total;
            $kerentanan->save();

        }

    }
}

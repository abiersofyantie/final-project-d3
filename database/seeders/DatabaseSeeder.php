<?php

namespace Database\Seeders;

use App\Models\IndeksKapasitas;
use App\Models\KerentananEkonomi;
use App\Models\KerentananFisik;
use App\Models\KerentananLingkungan;
use App\Models\KerentananSosial;
use Database\Factories\BencanaFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            KabupatenSeeder::class,
            //DummySeeder::class,
            FuzzyAhpsSeeder::class,
            BencanaSeeder::class,
            KerentananEkonomiSeeder::class,
            KerentananSosialSeeder::class,
            KerentananFisikSeeder::class,
            KerentananLingkunganSeeder::class,
            IndeksKapasitasSeeder::class,
        ]);
    }
}

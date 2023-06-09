<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bencana>
 */
class BencanaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kabupaten_id' => fake()->numberBetween(1, 38),
            'alamat_bencana' => fake()->address(),
            'tanggal_bencana' => fake()->date(),
            'waktu_bencana' => fake()->time('H:i'),
            'gerakan_tanah' => fake()->randomFloat(2, 0, 1),
        ];
    }
}

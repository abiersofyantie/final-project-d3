<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bencana>
 */
class IndeksKapasitasFactory extends Factory
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
            'skor' => fake()->randomFloat(2, 0, 1),
        ];
    }
}

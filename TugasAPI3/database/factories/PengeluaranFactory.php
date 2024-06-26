<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengeluaran>
 */
class PengeluaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->judulpengeluaran,
            'deskripsi' => $this->faker->word,
            'jumlah' => $this->faker->jumlah,
            'tanggal_pengeluaran' => now(),
        ];
    }
}

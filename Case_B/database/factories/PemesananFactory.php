<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemesananFactory extends Factory
{
    protected $model = Pemesanan::class;

    public function definition()
    {
        return [
            'nama_pemesan' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'nama_konser' => $this->faker->word() . ' Live',
            'tanggal_konser' => $this->faker->dateTimeBetween('now', '+1 year'),
            'jumlah_tiket' => $this->faker->numberBetween(1, 5),
            'kategori_tiket' => $this->faker->randomElement(['VIP', 'Reguler', 'Festival']),
            'status_pemesanan' => $this->faker->randomElement(['terkonfirmasi', 'pending', 'dibatalkan']),
        ];
    }
}

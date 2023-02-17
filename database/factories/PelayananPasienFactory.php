<?php

namespace Database\Factories;

use App\Models\Icd;
use App\Models\User;
use App\Models\KajianPasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PelayananPasien>
 */
class PelayananPasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kajian_pasiens_id' => $this->faker->randomElement(KajianPasien::pluck('id')),
            'tanggal_pemeriksaan' => $this->faker->dateTimeBetween('-1 week', '+1 days'),
            'users_id' => mt_rand(2, 6),
            'keluhan_utama' => $this->faker->sentence(6),
            'rps' => $this->faker->sentence(3, 20),
            'rpo' => $this->faker->sentence(3, 20),
            'icds_kode_icd' => $this->faker->randomElement(Icd::pluck('kode_icd')),
            'penatalaksanaan' => $this->faker->sentence(3, 20),
            'tindakan' => $this->faker->sentence(3, 20),
            'edukasi' => $this->faker->sentence(3, 20),
            'jenis_kasus' => $this->faker->word(1),
            'unit_pelayanans_id' => mt_rand(1, 6)
        ];
    }
}

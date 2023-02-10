<?php

namespace Database\Factories;

use App\Models\Pasiens;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KajianPasien>
 */
class KajianPasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pasiens_no_rm' => $this->faker->randomElement(Pasiens::pluck('no_rm')),
            'tanggal_pemeriksaan' => $this->faker->dateTimeBetween('-1 week', '+1 days'),
            'users_id' => mt_rand(2,4),
            'tensi' => $this->faker->randomNumber(6, true),
            'nadi' => $this->faker->randomNumber(6, true),
            'resp' => $this->faker->randomNumber(6, true),
            'suhu' => $this->faker->randomNumber(6, true),
            'bb' => $this->faker->randomNumber(6, true),
            'tb' => $this->faker->randomNumber(6, true),
            'imt' => $this->faker->randomNumber(6, true),
            'sirkulasi_cairan' => $this->faker->sentence(3, 20),
            'perkemihan' => $this->faker->sentence(3, 20),
            'pernapasan' => $this->faker->sentence(3, 20),
            'pencernaan' => $this->faker->sentence(3, 20),
            'muskuloskeletal' => $this->faker->sentence(3, 20),
            'fungsi_penglihatan' => $this->faker->sentence(3, 20),
            'fungsi_pendengaran' => $this->faker->sentence(3, 20),
            'fungsi_perasa' => $this->faker->sentence(3, 20),
            'fungsi_perabaan' => $this->faker->sentence(3, 20),
            'fungsi_penciuman' => $this->faker->sentence(3, 20),
            'kulit' => $this->faker->sentence(3, 20),
            'tidur_istirahat' => $this->faker->sentence(3, 20),
            'mental' => $this->faker->sentence(3, 20),
            'komunikasi' => $this->faker->sentence(3, 20),
            'kebersihan_diri' => $this->faker->sentence(3, 20),
            'perawatan_diri' => $this->faker->sentence(3, 20),
            'labolatorium' => $this->faker->sentence(3, 20),
            'radiologi' => $this->faker->sentence(3, 20),
            'ekg' => $this->faker->sentence(3, 20),
            'usg' => $this->faker->sentence(3, 20),
            'unit_pelayanans_id' => mt_rand(1, 6),
            'status' => mt_rand(0, 0)
        ];
    }
}

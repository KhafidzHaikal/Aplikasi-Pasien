<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasiens>
 */
class PasiensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_rm' => $this->faker->randomNumber(6, true),
            'tanggal_kunjungan' => $this->faker->dateTimeBetween('-1 week', '+1 days'),
            'users_id' => $this->faker->randomElement(User::pluck('id')),
            'name' => $this->faker->name(),
            'tanggal_lahir' => $this->faker->unixTime(),
            'jenis_kelamin' => $this->faker->title(),
            'nik' => $this->faker->nik(),
            'nama_kk' => $this->faker->lastName(),
            'alamat' => $this->faker->address(),
            'pekerjaan' => $this->faker->jobTitle(),
            'pendidikan' => $this->faker->company(),
            'agama' => $this->faker->word(1),
            'status_perkawinan' => $this->faker->word(1),
            'pembiayaan' => $this->faker->word(1),
            'status_kunjungan' => $this->faker->word(1),
            'alergi_obat' => $this->faker->sentence(mt_rand(2, 5)),
        ];
    }
}

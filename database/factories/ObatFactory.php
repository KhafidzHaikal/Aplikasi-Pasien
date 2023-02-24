<?php

namespace Database\Factories;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_obat' => Uuid::uuid4()->getHex(),
            'tanggal_masuk' => $this->faker->dateTimeBetween('-1 week', '+1 days'),
            'name' => $this->faker->word(1),
            'sediaan' => $this->faker->word(1),
            'tanggal_kadaluarsa' => $this->faker->dateTimeBetween('-1 week', '+1 days'),
            'sumber_dana' => $this->faker->word(1),
            'harga' => $this->faker->randomNumber(4, true),
            'stok_lama' => $this->faker->randomNumber(3, true),
            'stok_baru' => $this->faker->randomNumber(2, true),
        ];
    }
}

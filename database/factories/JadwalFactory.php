<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hari' => $this->faker->dayOfWeek(),
            'jam' => '08.00 - 09.45',
            'kelas_id' => '1',
            'mapel_id' => mt_rand(1, 7),
            'guru_id' => mt_rand(1, 4)
        ];
    }
}

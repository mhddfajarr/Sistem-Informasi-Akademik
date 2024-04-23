<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->nik(),
            'role' => 'Siswa',
            'nama_siswa' => $this->faker->name(),
            'tmpt_tgl_lahir' => $this->faker->dateTime(),
            'jenis_kel' => mt_rand(0, 1) ? 'Laki-laki' : 'Perempuan',
            'kelas_id' => mt_rand(1, 3),
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->nik(),
            'email' => $this->faker->unique()->safeEmail(),
            'agama' => 'Islam',
            'nama_ayah' => $this->faker->firstNameMale(),
            'nama_ibu' => $this->faker->firstNameFemale(),
            'password' => bcrypt('1234')

        ];
    }
}

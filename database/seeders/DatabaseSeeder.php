<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Role;
use \App\Models\User;
use \App\Models\Kelas;
use \App\Models\TataUsaha;
use \App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\Nilai;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Siswa::factory(96)->create();
        Jadwal::factory(7)->create();





        Mapel::create([
            'nama_mapel' => 'Matematika'
        ]);
        Mapel::create([
            'nama_mapel' => 'Bahasa Indonesia'
        ]);
        Mapel::create([
            'nama_mapel' => 'Fisika'
        ]);
        Mapel::create([
            'nama_mapel' => 'Sejarah'
        ]);

        Mapel::create([
            'nama_mapel' => 'Kimia'
        ]);
        Mapel::create([
            'nama_mapel' => 'Biologi'
        ]);
        Mapel::create([
            'nama_mapel' => 'Sosiologi'
        ]);

        Role::create([
            'role' => 'tata_usaha'
        ]);
        Role::create([
            'role' => 'guru'
        ]);
        Role::create([
            'role' => 'siswa'
        ]);

        Kelas::create([
            'nama_kelas' => '12 IPA 1',
            'guru_id' => '1'
        ]);
        Kelas::create([
            'nama_kelas' => '12 IPA 2',
            'guru_id' => '2'
        ]);
        Kelas::create([
            'nama_kelas' => '12 IPA 3',
            'guru_id' => '3'
        ]);

        Guru::create([
            'nip' => '122157684',
            'role' => 'Guru',
            'nama_guru' => 'Mega S.pd',
            'tmpt_tgl_lahir' => 'Jakarta, 21-April-1969',
            'jenis_kel' => 'Perempuan',
            'alamat' => 'Bantul',
            'no_hp' => '089767654512',
            'email' => 'Mega@gmail.com',
            'agama' => 'islam',
            'password' => bcrypt('1234')
        ]);
        Guru::create([
            'nip' => '98124714',
            'role' => 'Guru',
            'nama_guru' => 'Rio Irawan',
            'tmpt_tgl_lahir' => 'Palembang, 21-April-2001',
            'jenis_kel' => 'Laki-laki',
            'alamat' => 'Bantul',
            'no_hp' => '089767654512',
            'email' => 'rio@gmail.com',
            'agama' => 'islam',
            'password' => bcrypt('1234')
        ]);
        Guru::create([
            'nip' => '12412451',
            'role' => 'Guru',
            'nama_guru' => 'Samuel Eko',
            'tmpt_tgl_lahir' => 'Sabang, 21-April-2001',
            'jenis_kel' => 'Laki-laki',
            'alamat' => 'Bantul',
            'no_hp' => '089767654512',
            'email' => 'Samuel@gmail.com',
            'agama' => 'islam',
            'password' => bcrypt('1234')
        ]);
        Guru::create([
            'nip' => '92375632',
            'role' => 'Guru',
            'nama_guru' => 'Agus',
            'tmpt_tgl_lahir' => 'Sabang, 21-April-2001',
            'jenis_kel' => 'Laki-laki',
            'alamat' => 'Bantul',
            'no_hp' => '089767654512',
            'email' => 'Agus@gmail.com',
            'agama' => 'islam',
            'password' => bcrypt('1234')
        ]);
        TataUsaha::create([
            'nip' => '19121399',
            'role' => 'TU',
            'nama_guru' => 'Muhammad Fajar',
            'tmpt_tgl_lahir' => 'Sabang, 08-desember-2001',
            'jenis_kel' => 'Laki-laki',
            'alamat' => 'Jl. Samalanga 3, Dusun samalanga 3, Kota Banda Aceh',
            'no_hp' => '089767654512',
            'email' => 'mhddfajar@gmail.com',
            'agama' => 'islam',
            'password' => bcrypt('1234')
        ]);
    }
}

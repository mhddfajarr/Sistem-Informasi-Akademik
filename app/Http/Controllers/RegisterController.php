<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\TataUsaha;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class RegisterController extends Controller
{
    public function index()
    {
        return view('TU/registrasi/guru', [
            'title' => 'Registrasi Guru'
        ]);
    }

    public function siswa()
    {
        return view('TU/registrasi/siswa', [
            'title' => 'Registrasi Siswa',
            'kelas' => Kelas::all()
        ]);
    }

    public function TU()
    {
        return view('TU/registrasi/tu', [
            'title' => 'Registrasi Tata Usaha'
        ]);
    }

    public function prosesGuru(Request $request)
    {

        $request->validate([
            'nama' => 'required|min:3|max:100',
            'nip' => 'required|min:3|unique:gurus',
            'password' => 'required|min:5|max:20'
        ]);

        $data = [
            'nip' => $request->input('nip'),
            'role' => 'guru',
            'nama_guru' => $request->input('nama'),
            'password' => bcrypt($request->input('password'))
        ];
        Guru::create($data);

        $request->session()->flash('berhasil', 'Registrasi Guru Berhasil!');
        return redirect('/registrasi');
    }

    public function prosesTU(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:100',
            'nip' => 'required|min:3|unique:tata_usahas',
            'password' => 'required|min:5|max:20'
        ]);

        $data = [
            'nip' => $request->input('nip'),
            'role' => 'TU',
            'nama_guru' => $request->input('nama'),
            'password' => bcrypt($request->input('password'))
        ];
        TataUsaha::create($data);
        $request->session()->flash('berhasil', 'Registrasi Tata Usaha Berhasil!');
        return redirect('/registrasi/TU');
    }

    public function prosesSiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:100',
            'nip' => 'required|min:3|unique:siswas',
            'password' => 'required|min:5|max:20'
        ]);

        $data = [
            'nip' => $request->input('nip'),
            'role' => 'siswa',
            'nama_siswa' => $request->input('nama'),
            'kelas_id' => $request->input('kelas'),
            'password' => bcrypt($request->input('password'))
        ];
        Siswa::create($data);
        $request->session()->flash('berhasil', 'Registrasi Siswa Berhasil!');
        return redirect('/registrasi/siswa');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Kelas;
use App\models\Siswa;
use App\models\Guru;
use Illuminate\Support\Facades\Auth;
use App\models\Jadwal;
use Illuminate\Support\Facades\DB;

class G_guruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function kelas()
    {
        return view('guru/kelas', [
            'title' => "Data Kelas",
            'data_kelas' => Kelas::with('guru')->get()
        ]);
    }

    public function siswa(Kelas $kelas)
    {
        $siswa = $kelas->siswa->sortBy('nama_siswa');

        if (request('search')) {
            // $siswa = $kelas->siswa->where('nama_siswa', 'like', '%' . request('search') . '%');
            $nama =  request('search');
            $siswa = DB::table('siswas')
                ->where('kelas_id', $kelas->id)
                ->where('nama_siswa', 'like', '%' . $nama  . '%')
                ->orWhere('nip', 'like', '%' . $nama . '%')
                ->where('kelas_id', $kelas->id)
                ->get();
            if (!$siswa || !$siswa->count()) {
                session()->flash('no-results', 'Your search produced no results');
            }
        }

        return view('guru/dataSiswa', [
            'title' => $kelas->nama_kelas,
            'wali_kelas' => $kelas->guru,
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }

    public function detailSiswa(Siswa $siswa)
    {
        return view('guru/detailSiswa', [
            'title' => "Profile Siswa",
            'data_siswa' => $siswa
        ]);
    }

    public function dataGuru()
    {

        $guru = Guru::all()->sortBy('nama_guru');

        if (request('search')) {
            $nama = request('search');

            $guru = DB::table('gurus')
                ->where('nama_guru', 'like', '%' . $nama . '%')
                ->orWhere('nip', 'like', '%' . $nama . '%')
                ->get();
        }
        return view('guru/dataGuru', [
            'title' => "Data Guru",
            'data_guru' => $guru
        ]);
    }

    public function detailGuru(guru $guru)
    {
        return view('guru/detailGuru', [
            'title' => "Profile Guru",
            'guru' => $guru
        ]);
    }

    public function jadwal()
    {
        $id_guru = Auth::guard('guru')->user()->id;
        return view('guru/jadwal', [
            'title' => "Jadwal mata pelajaran",
            // 'jadwal' => Jadwal::with(['guru', 'kelas'])->get(),
            'jadwal' => Jadwal::with(['guru', 'kelas'])->where('guru_id', $id_guru)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Models\TataUsaha;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Kelas;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('TU/jadwal', [
            'title' => "Jadwal mata pelajaran",
            'jadwal' => Jadwal::with(['guru', 'kelas', 'mapel'])->get(),
            'siswa' => Siswa::all(),
            'guru' => Guru::all(),
            'TU' => TataUsaha::all(),
            'siswaLaki' => Siswa::where('jenis_kel', 'Laki-laki')->count(),
            'siswaPerempuan' => Siswa::where('jenis_kel', 'Perempuan')->count()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahJadwal()
    {
        return view('TU/tambahJadwal', [
            'title' => 'Tambah jadwal',
            'kelas' => Kelas::all(),
            'mapel' => Mapel::all(),
            'guru' => Guru::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|max:10',
            'jam' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            'guru_pengampu' => 'required',
        ]);
        $data = [
            'hari' => $request->input('hari'),
            'jam' => $request->input('jam'),
            'kelas_id' => $request->input('kelas'),
            'mapel_id' => $request->input('mapel'),
            'guru_id' => $request->input('guru_pengampu'),
        ];

        Jadwal::create($data);
        $request->session()->flash('berhasil', 'Jadwal Berhasil Ditambahkan!');
        return redirect('/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {

        return view('TU/editJadwal', [
            'title' => 'Edit jadwal',
            'kelas' => Kelas::all(),
            'mapel' => Mapel::all(),
            'guru' => Guru::all(),
            'Jadwal' => $jadwal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJadwalRequest  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $request->validate([
            'hari' => 'required|max:10',
            'jam' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            'guru_pengampu' => 'required',
        ]);
        $data = [
            'hari' => $request->hari,
            'jam' => $request->jam,
            'kelas_id' => $request->kelas,
            'mapel_id' => $request->mapel,
            'guru_id' => $request->guru_pengampu,
        ];

        Jadwal::where('id', $jadwal->id)
            ->update($data);
        $request->session()->flash('berhasil', 'Jadwal Berhasil Diperbarui!');
        return redirect('/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        Jadwal::destroy($jadwal->id);
        return redirect('/jadwal')->with('berhasil', 'Jadwal Berhasil Dihapus!');
    }
}

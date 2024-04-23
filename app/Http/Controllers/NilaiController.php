<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Kelas;
use App\models\Mapel;
use App\models\Guru;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('TU/kelasNilai', [
            'title' => "Data Kelas Nilai",
            'data_kelas' => Kelas::with('guru')->get()
        ]);
    }

    public function nilaiSiswa(Kelas $kelas)
    {
        // get nilai siswa where kelas = $kelas
        $nilai = DB::table('nilais')
            ->join('siswas', 'siswas.id', '=', 'nilais.siswa_id')
            ->join('mapels', 'mapels.id', '=', 'nilais.mapel_id')
            ->select('siswas.nama_siswa', 'siswas.id', 'mapels.nama_mapel', 'nilais.nilai', 'nilais.siswa_id')
            ->where('siswas.kelas_id', '=', $kelas->id)
            ->get();
        // dd($nilai);

        return view(
            'TU/nilai',
            [
                'title' => $kelas->nama_kelas,
                'wali_kelas' => $kelas->guru,
                'siswa' => $kelas->siswa->sortBy('nama_siswa'),
                'kelas' => $kelas,
                'nilai' => $nilai,
                'mapel' => Mapel::all(),
            ],
        );
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

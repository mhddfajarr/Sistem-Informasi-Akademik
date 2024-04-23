<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Kelas;
use App\Models\Mapel;
use App\models\Siswa;
use App\models\Nilai;
use Illuminate\Support\Facades\DB;

class G_nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru/kelasNilai', [
            'title' => "Data Kelas",
            'data_kelas' => Kelas::with('guru')->get()
        ]);
    }

    public function kelas()
    {
        return view('guru/kelas', [
            'title' => "Data Kelas",
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
            'guru/nilaiSiswa',
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
        $request->validate([
            'Matematika' => 'required|max:3',
            'Indonesia' => 'required|max:3',
            'Fisika' => 'required|max:3',
            'Sejarah' => 'required|max:3',
            'Kimia' => 'required|max:3',
            'Biologi' => 'required|max:3',
            'Sosiologi' => 'required|max:3',
        ]);
        $array_mapel = [
            'Matematika', 'Indonesia', 'Fisika', 'Sejarah', 'Kimia', 'Biologi', 'Sosiologi'
        ];
        //find how many record in model mapels
        $jumlahmapel = Mapel::all()->count();

        //looping to insert data to table nilai
        for ($i = 0; $i < $jumlahmapel; $i++) {
            $id_mapel = Mapel::where('nama_mapel', 'like', '%' . $array_mapel[$i] . '%')->first()->id;
            $nama_mapel = $array_mapel[$i];
            $nilai = $request->$nama_mapel;
            Nilai::create([
                'siswa_id' => $request->siswa_id,
                'mapel_id' => $id_mapel,
                'nilai' => $nilai
            ]);
        }
        $siswa = Siswa::find($request->siswa_id);
        return redirect()->route('G_kelasNilaiSiswa', ['kelas' => $siswa->kelas_id])->with('berhasil', 'Nilai berhasil ditambahkan');

        // $kelas = $request->siswa_id;
        // return redirect('G_kelasNilai', $siswa->kelas_id)->with('berhasil', 'Data berhasil dihapus!');
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
    // public function edit(Siswa $siswa)
    // {

    //     $nilai = Nilai::whereHas('siswa', function ($query) use ($siswa->id) {
    //         $query->where('id', $siswa->id);
    //     })->whereHas('mapel', function ($query) use ($mapel_id) {
    //         $query->where('id', $mapel_id);
    //     })->first();

    //     if ($nilai) {
    //         $siswa = $nilai->mapel->nama_mapel;
    //         $nilai = $nilai->nilai;
    //     } else {
    //         echo "Nilai tidak value";
    //     }

    //     return view('guru/editNilai', [
    //         'title' => 'Edit Nilai',
    //         'siswa' => $siswa,
    //         'nilai' => $nilai
    //     ]);
    // }

    public function input(Siswa $siswa)
    {
        return view('guru/inputNilai', [
            'title' => 'Edit Nilai',
            'siswa' => $siswa
        ]);
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
    public function destroy(Siswa $siswa)
    {
        Nilai::where('siswa_id', $siswa->id)->delete();
        return back()->with('berhasil', 'Nilai berhasil dihapus!');
    }
}

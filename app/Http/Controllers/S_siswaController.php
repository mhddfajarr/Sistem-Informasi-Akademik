<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Support\Facades\Storage;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class S_siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas_id = Auth::guard('siswa')->user()->kelas_id;
        return view('siswa/jadwal', [
            'title' => "Jadwal mata pelajaran",
            'jadwal' => Jadwal::with(['guru', 'kelas'])->get(),
            'jadwal' => Jadwal::with(['guru', 'kelas'])->where('kelas_id', $kelas_id)->get(),
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
        return view('siswa/dataGuru', [
            'title' => "Data Guru",
            'data_guru' => $guru
        ]);
    }

    public function detailGuru(Guru $guru)
    {
        return view('siswa/detailGuru', [
            'title' => "Profile Guru",
            'guru' => $guru
        ]);
    }

    public function kelasNilai()
    {
        return view('siswa/kelasNilai', [
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
            'siswa/nilai',
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

    public function materi()
    {
        return view('siswa/materi', [
            'title' => "Materi Pelajaran",
            'materi' => Materi::all()
        ]);
    }

    public function download(Materi $materi)
    {
        $pathToFile = public_path('file/' . $materi->nama_file);
        return response()->download($pathToFile);
    }

    public function Profile()
    {
        return view('siswa/profile', [
            'title' => "Profile",
            'data_login' => Auth::guard('siswa')->user()
        ]);
    }
    public function editProfile()
    {

        return view('siswa/editProfile', [
            'title' => "Edit Profile",
            'data_login' => Auth::guard('siswa')->user()
        ]);
    }
    public function updateProfile(Request $request)
    {
        $data_login = Auth::guard('siswa')->user();
        $rules = [
            'nama' => 'required',
            'no_hp' => 'integer',
            'foto' => 'nullable|image|file|max:5120',
            'email' => 'email'
        ];
        if ($request->nip != $data_login->nip) {
            $rules['nip'] = 'required|unique:siswa,nip|integer';
        }

        $request->validate($rules);

        $data = [
            'nama_siswa' => $request->nama,
            'role' => 'siswa',
            'nip' => $request->nip,
            'tmpt_tgl_lahir' => $request->tmpt_tgl_lahir,
            'jenis_kel' => $request->jenis_kel,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'agama' => $request->agama,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu
        ];
        if ($request->file('foto')) {
            if ($request->fotoLama) {
                Storage::delete($request->fotoLama);
            }
            $data['foto'] = $request->file('foto')->store('Guru-foto');
        }

        Siswa::where('id', $data_login->id)
            ->update($data);
        $request->session()->flash('berhasil', 'Profil Berhasil Diperbarui!');
        return redirect('/S_profile');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Response;
use App\Http\Requests\UpdateDataSiswaRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\models\Kelas;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(Kelas $kelas)
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

        return view('TU/dataSiswa', [
            'title' => $kelas->nama_kelas,
            'wali_kelas' => $kelas->guru,
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }


    public function kelas()
    {
        return view('TU/kelas', [
            'title' => "Data Kelas",
            'data_kelas' => Kelas::with('guru')->get()
        ]);
    }

    public function tambahKelas()
    {
        return view('TU/tambahKelas', [
            'title' => 'Tambah Kelas',
            'guru' => Guru::all()
        ]);
    }

    public function prosesKelas(Request $request)
    {

        $request->validate([
            'nama_kelas' => 'required|max:20|unique:kelas,nama_kelas',
            'guru_pengampu' => 'required',
        ]);
        $data = [
            'nama_kelas' => $request->input('nama_kelas'),
            'guru_id' => $request->input('guru_pengampu')
        ];
        Kelas::create($data);
        $request->session()->flash('berhasil', 'Kelas Berhasil Ditambahkan!');
        return redirect('/dataKelas');
    }


    public function detailSiswa(Siswa $siswa)
    {
        return view('TU/detailSiswa', [
            'title' => "Profile Siswa",
            'data_siswa' => $siswa
        ]);
    }

    public function editSiswa(siswa $siswa)
    {
        return view('TU/editDataSiswa', [
            'title' => "Edit Data Siswa",
            'data_siswa' => $siswa,
            'data_kelas' => Kelas::all()
        ]);
    }


    // public function update(Request $request, siswa $siswa)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'no_hp' => 'integer',
    //         'foto' => 'image|file|max:5120',
    //         'email' => 'email'
    //     ]);

    //     if ($request->nip != $siswa->nip) {
    //         $rules['nip'] = 'required|unique:tata_usahas,nip|integer';
    //     }

    //     $data = [
    //         'nama_guru' => $request->nama,
    //         'role' => 'Siswa',
    //         'nip' => $request->nip,
    //         'tmpt_tgl_lahir' => $request->tmpt_tgl_lahir,
    //         'jenis_kel' => $request->jenis_kel,
    //         'alamat' => $request->alamat,
    //         'no_hp' => $request->no_hp,
    //         'email' => $request->email,
    //         'agama' => $request->agama
    //     ];

    //     Siswa::where('id', $siswa->id)->update($data);
    //     return back()->with('berhasil', 'Data Siswa Berhasil Diperbarui!');
    // }

    public function update(Request $request, siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'integer',
            'email' => 'email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->nip != $siswa->nip) {
            $rules['nip'] = 'required|unique:siswas,nip|integer';
        }
        $data = [
            'nama_siswa' => $request->nama,
            'role' => 'Siswa',
            'nip' => $request->nip,
            'tmpt_tgl_lahir' => $request->tmpt_tgl_lahir,
            'jenis_kel' => $request->jenis_kel,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'agama' => $request->agama,
            'foto' => $request->foto,
        ];
        // if ($request->hasFile('foto')) {
        //     $foto = $request->file('foto');
        //     $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
        //     $tujuan_upload = public_path('/images');
        //     $foto->move($tujuan_upload, $nama_foto);
        // } else {
        //     $nama_foto = $siswa->foto;
        // }
        if ($request->hasFile('foto')) {
            if ($request->fotoLama) {
                Storage::delete($request->fotoLama);
            }
            $data['foto'] = $request->file('foto')->store('Siswa-foto');
        } else {
            $data['foto'] = $siswa->foto;
        }
        // if ($request->file('foto')) {
        //     if ($request->fotoLama) {
        //         Storage::delete($request->fotoLama);
        //     }
        //     $data['foto'] = $request->file('foto')->store('Siswa-foto');
        // }

        Siswa::where('id', $siswa->id)
            ->update($data);
        return redirect('/detailSiswa/' . $siswa->id)->with('berhasil', 'Data Siswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Siswa::findOrFail($id);
        $data->delete();

        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}

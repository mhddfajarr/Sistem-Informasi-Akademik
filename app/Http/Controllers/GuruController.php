<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function Index()
    {

        $guru = Guru::all()->sortBy('nama_guru');

        if (request('search')) {
            $nama = request('search');

            $guru = DB::table('gurus')
                ->where('nama_guru', 'like', '%' . $nama . '%')
                ->orWhere('nip', 'like', '%' . $nama . '%')
                ->get();
        }
        return view('TU/dataGuru', [
            'title' => "Data Guru",
            'data_guru' => $guru
        ]);
    }

    public function detailGuru(guru $guru)
    {
        return view('TU/detailGuru', [
            'title' => "Profile Guru",
            'guru' => $guru
        ]);
    }

    public function editGuru(Guru $guru)
    {
        return view('TU/editDataGuru', [
            'title' => "Edit Data Guru",
            'data_guru' => $guru,
        ]);
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'integer',
            'email' => 'email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->nip != $guru->nip) {
            $rules['nip'] = 'required|unique:gurus,nip|integer';
        }

        // if ($request->foto) {
        //     $image = $request->file('foto');
        //     $imageName = $image->getClientOriginalName();
        //     $request->foto->move(public_path('img'), $imageName);
        // } else if (empty($request->foto)) {
        //     $imageName = $guru->foto;
        // }
        $data = [
            'nama_guru' => $request->nama,
            'role' => 'guru',
            'nip' => $request->nip,
            'tmpt_tgl_lahir' => $request->tmpt_tgl_lahir,
            'jenis_kel' => $request->jenis_kel,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'agama' => $request->agama,
            'foto' => $request->foto,
        ];
        if ($request->hasFile('foto')) {
            if ($request->fotoLama) {
                Storage::delete($request->fotoLama);
            }
            $data['foto'] = $request->file('foto')->store('guru-foto');
        } else {
            $data['foto'] = $guru->foto;
        }

        Guru::where('id', $guru->id)
            ->update($data);
        return redirect('/detailGuru/' . $guru->id)->with('berhasil', 'Data Guru Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Guru::findOrFail($id);
        $data->delete();

        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}

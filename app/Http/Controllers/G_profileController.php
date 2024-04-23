<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class G_profileController extends Controller
{
    public function Index()
    {
        return view('guru/profile', [
            'title' => "Data Guru",
            'data_login' => Auth::guard('guru')->user()
        ]);
    }

    public function edit()
    {
        $data_login = Auth::guard('guru')->user();
        return view('guru/editProfile', [
            'title' => "Edit Profile",
            'data_login' => $data_login
        ]);
    }

    public function update(Request $request)
    {
        $data_login = Auth::guard('guru')->user();
        $rules = [
            'nama' => 'required',
            // 'no_hp' => 'integer',
            'foto' => 'nullable|image|file|max:5120',
            // 'email' => 'email'
        ];
        if ($request->nip != $data_login->nip) {
            $rules['nip'] = 'required|unique:guru,nip|integer';
        }

        $request->validate($rules);

        $data = [
            'nama_guru' => $request->nama,
            'role' => 'guru',
            'nip' => $request->nip,
            'tmpt_tgl_lahir' => $request->tmpt_tgl_lahir,
            'jenis_kel' => $request->jenis_kel,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'agama' => $request->agama
        ];
        if ($request->file('foto')) {
            if ($request->fotoLama) {
                Storage::delete($request->fotoLama);
            }
            $data['foto'] = $request->file('foto')->store('Guru-foto');
        }

        Guru::where('id', $data_login->id)
            ->update($data);
        $request->session()->flash('berhasil', 'Profil Berhasil Diperbarui!');
        return redirect('/G_profile');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\TataUsaha;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('TU/profile', [
            'title' => "Data Guru",
            'data_login' => Auth::guard('TU')->user()
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
    public function edit()
    {
        $data_login = Auth::guard('TU')->user();
        return view('TU/editProfile', [
            'title' => "Data Guru",
            'data_login' => $data_login
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data_login = Auth::guard('TU')->user();
        $rules = [
            'nama' => 'required',
            'no_hp' => 'integer',
            'foto' => 'nullable|image|file|max:5120',
            'email' => 'email'
        ];

        if ($request->nip != $data_login->nip) {
            $rules['nip'] = 'required|unique:tata_usahas,nip|integer';
        }

        $request->validate($rules);

        $data = [
            'nama_guru' => $request->nama,
            'role' => 'TU',
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
            $data['foto'] = $request->file('foto')->store('TU-foto');
        }

        TataUsaha::where('id', $data_login->id)
            ->update($data);
        $request->session()->flash('berhasil', 'Profil Berhasil Diperbarui!');
        return redirect('/profile');
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

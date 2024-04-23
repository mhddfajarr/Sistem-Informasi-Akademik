<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Materi;

class G_materiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru/materi', [
            'title' => "Materi Pelajaran",
            'materi' => Materi::all()
        ]);
    }

    public function download(Materi $materi)
    {
        $pathToFile = public_path('file/' . $materi->nama_file);
        return response()->download($pathToFile);
    }


    public function uploadMateri()
    {
        return view('guru/Uploadmateri', [
            'title' => "Upload Materi",
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
        $this->validate($request, [
            'file' => 'mimes:pdf,xls,xlsx,ppt,pptx,csv'
        ]);


        $data = $request->file('file');
        $nama_materi = $data->getClientOriginalName();
        $data->move(public_path('file/'), $nama_materi);

        $file = ([
            'nama_file' => $nama_materi,
            'catatan' => $request->input('catatan')
        ]);
        Materi::create($file);
        $request->session()->flash('berhasil', 'Materi Berhasil Ditambahkan!');
        return redirect('/materi');
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
    public function destroy(Materi $materi)
    {
        Materi::destroy($materi->id);
        return redirect('/materi')->with('berhasil', 'Materi berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportNilai($id)
    {
        $siswa = Siswa::where('kelas_id', $id)->orderBy('nama_siswa')->get();
        $mapel = Mapel::all();
        $nilai = Nilai::whereIn('siswa_id', $siswa->pluck('id'))->get();
        $kelas = Kelas::find($id);
        $wali_kelas = Guru::find($kelas->guru_id);

        $title = "Kelas " . $kelas->nama_kelas;

        return Excel::download(new NilaiExport($siswa, $mapel, $nilai, $wali_kelas, $title), 'nilai_kelas.xlsx');
    }
}

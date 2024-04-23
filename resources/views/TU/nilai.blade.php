@extends('TU.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_panel" style="margin-top: 8px; ">
                <h6 style="color: black;">Data siswa kelas<span style="margin-left: 6px"></span>: {{ $title }}</h6>
                <h6 style="color: black;">Wali kelas<span style="margin-left: 54px"></span>: {{ $wali_kelas->nama_guru }}</h6>
                <h6 style="color: black;">Jumlah siswa<span style="margin-left: 31px"></span>: {{ @count($siswa) }}</h6> 
                <hr style="border-top: 1px solid black;">
            <div class="x_content">
                <table class="table table-bordered">
                    <div class="col-12">
                        <a href="/exportNilai_TU/{{ $kelas->id }}" class="btn btn-success btn-sm" style="float: right">Export Excel</a>
                    </div>
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            @foreach ($mapel as $mapel)
                            <th>{{ $mapel->nama_mapel }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @if ($siswa->count())
                        @foreach ($siswa as $siswa)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $siswa->nama_siswa }}</td>
                                @foreach ($nilai as $nilais)
                                    @if($siswa->id == $nilais->siswa_id)
                                        <td>{{ $nilais->nilai }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        @else
                           <tr>
                                <td colspan="4" style="text-align: center">Data tidak ditemukan</td>
                           </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
  </div>
@endsection
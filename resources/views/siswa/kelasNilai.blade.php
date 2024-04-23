@extends('siswa.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Kelas</h3>
                </span>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_kelas as $kelas)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td>{{ $kelas->guru->nama_guru }}</td>
                                <td>
                                    <a href="/S_nilaiSiswa/{{ $kelas->id }}"><span class="btn btn-success btn-sm">Data Nilai</span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
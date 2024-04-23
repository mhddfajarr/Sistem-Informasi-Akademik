@extends('guru.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Jadwal</h3>
                </span>
            </div>

            <div class="x_content">
              @if (session()->has('berhasil'))
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    {{ session('berhasil') }}
                  </div>
                @endif
                <table class="table table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>NO</th>
                            <th>HARI</th>
                            <th>JAM</th>
                            <th>KELAS</th>
                            <th>MATA PELAJARAN</th>
                            <th>GURU PENGAMPU</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $jdwl)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $jdwl->hari }}</td>
                                <td>{{ $jdwl->jam }}</td>
                                <td>{{ $jdwl->kelas->nama_kelas }}</td>
                                <td>{{ $jdwl->mapel->nama_mapel }}</td>
                                <td>{{ $jdwl->guru->nama_guru }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
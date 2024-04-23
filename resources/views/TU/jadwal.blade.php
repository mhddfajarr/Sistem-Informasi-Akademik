@extends('TU.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_content">
            <div class="row">
                <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 " >
                  <div class="tile-stats" style="padding-left: 20px;" >
                    <div class="icon"><i class="bi bi-mortarboard-fill" ></i>
                    </div>
                    <div class="count" >{{ @count($siswa) }}</div>

                    <h3 style="margin-bottom: 10px">Total Siswa</h3>
                    <div style="margin-left: 15px">
                        <h5 class="count_bottom"><i class="green">{{ $siswaLaki }} </i> Siswa Laki-laki</h5><br>
                        <h5 class="count_bottom" style="margin-top:-25px"><i class="green">{{ $siswaPerempuan }} </i> Siswa Perempuan</h5>
                    </div>
                  </div>
                </div>
                <div class="animated flipInY col-lg-4 col-md-3 col-sm-6  ">
                  <div class="tile-stats" style="padding-left: 40px;">
                    <div class="icon"><i class="bi bi-person-lines-fill"></i></i>
                    </div>
                    <div class="count">{{ @count($guru) }}</div>

                    <h3 style="margin-bottom: 10px">Total guru</h3>
                  </div>
                </div>
                <div class="animated flipInY col-lg-4 col-md-3 col-sm-6  ">
                  <div class="tile-stats" style="padding-left: 40px;">
                    <div class="icon"><i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div class="count">{{ @count($TU) }}</div>

                    <h3 style="margin-bottom: 10px">Total tata usaha</h3>
                  </div>
                </div>
              </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <div class="nav navbar-right panel_toolbox">
                    <li>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/jadwal/tambahJadwal"><button class="btn btn-success">Tambah jadwal </button></a>
                        </div>
                    </li>
                </div>
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
                            <th>Action</th>
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
                                <td>
                                    <a href="editJadwal/{{ $jdwl->id }}"><span class="badge badge-primary">edit</span></a>
                                    <form action="/hapusJadwal/{{ $jdwl->id }}" method="post" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button class="badge badge-danger border-0" onclick="return confirm('Apakah yakin data ingin dihapus?')">hapus</button>
                                    </form>
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
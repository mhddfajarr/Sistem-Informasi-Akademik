@extends('TU.main')

@section('container')
<div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
                <span>
                    <h3 style="color: black;">Data Siswa</h3>
                </span>
            <div class="x_content">
                @if (session()->has('berhasil'))
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    {{ session('berhasil') }}
                  </div>
                @endif
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $data_siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td>{{ $data_siswa->nip }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $data_siswa->tmpt_tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th>jenis kelamin</th>
                        <td>{{ $data_siswa->jenis_kel }}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{ $data_siswa->kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $data_siswa->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No Handphone</th>
                        <td>{{ $data_siswa->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $data_siswa->email }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $data_siswa->agama }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $data_siswa->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $data_siswa->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        @if($data_siswa->foto =='default.png')
                            <td><img src="../img/default.png" width="90" height="110"></td>
                        @else
                            <td><img src="{{ asset('storage/' . $data_siswa->foto) }}" width="90" height="110"></td>
                        @endif
                    </tr>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/editSiswa/{{ $data_siswa->id }}"><button class="btn btn-primary">Edit Data <i class="fa fa-pencil"></i></button></a>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
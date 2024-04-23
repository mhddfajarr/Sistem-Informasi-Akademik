@extends('guru.main')

@section('container')
<div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="title">
                <span>
                    <h3 style="color: black;">Profil Siswa</h3>
                </span>
            </div>
            <div class="x_content">
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
                        <td><img src="../img/{{ $data_siswa->foto }}" width="90" height="110"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
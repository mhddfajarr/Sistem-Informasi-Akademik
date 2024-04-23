@extends('siswa.main')

@section('container')
<div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="title">
                <span>
                    <h3 style="color: black;">Profil Guru</h3>
                </span>
            </div>
            <div class="x_content">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $guru->nama_guru }}</td>
                    </tr>
                    <tr>
                        <th>NIP</th>
                        <td>{{ $guru->nip }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $guru->tmpt_tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th>jenis kelamin</th>
                        <td>{{ $guru->jenis_kel }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $guru->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $guru->email }}</td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        @if($guru->foto =='default.png')
                        <td><img src="../img/default.png" width="90" height="110"></td>
                        @else
                        <td><img src="{{ asset('storage/' . $guru->foto) }}" width="90" height="110"></td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
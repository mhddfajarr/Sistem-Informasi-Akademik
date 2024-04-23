@extends('TU.main')

@section('container')
<div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="title">
                <span>
                    <h3 style="color: black;">Profil</h3>
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
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $data_login->nama_guru }}</td>
                    </tr>
                    <tr>
                        <th>NIP</th>
                        <td>{{ $data_login->nip }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $data_login->tmpt_tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th>jenis kelamin</th>
                        <td>{{ $data_login->jenis_kel }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $data_login->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No Handphone</th>
                        <td>{{ $data_login->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $data_login->email }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $data_login->agama }}</td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        @if(Auth::guard('TU')->user()->foto =='default.png')
                        <td><img src="/img/default.png" width="90" height="110"></td>
                        @else
                        <td><img src="{{ asset('storage/' . $data_login->foto) }}" width="90" height="110"></td>
                        @endif
                        
                    </tr>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/editProfile/{{ $data_login->id }}"><button class="btn btn-primary">Edit Profile</button></a>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
{{-- @extends('TU.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Edit Profile</h3>
                </span>
            </div>
            <div class="x_content">
                <form action="/editProfile" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    @csrf
                    @method('patch')
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">nama</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $data_login->nama_guru }}">
                            @error('nama')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">NIP</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nip" name="nip" value="{{ $data_login->nip }}" >
                            @error('nip')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Tempat, Tanggal lahir</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control" id="tmpt_tgl_lahir" name="tmpt_tgl_lahir" value="{{ $data_login->tmpt_tgl_lahir }}">
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Jenis Kelamin</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control" value="{{ $data_login->jenis_kel }}">
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data_login->alamat }}">
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">No Handphone</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ $data_login->no_hp }}">
                            @error('no_hp')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $data_login->email }}">
                            @error('email')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Agama</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control" name="agama" id="email" value="{{ $data_login->agama }}">
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Foto</label>
                        <input type="hidden" name="fotoLama" value="{{ $data_login->foto }}">
						<div class="col-md-5 col-sm-9 ">
                            <img class="foto-preview img-fluid">
							<input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto"  >
                            @error('foto')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3 ">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection --}}

@extends('TU.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Edit Data Siswa</h3>
                </span>
            </div>
            <div class="x_content">
                <form action="/editProfile" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    @csrf
                    @method('patch')
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">nama</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $data_login->nama_guru }}">
                            @error('nama')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">NIP</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nip" name="nip" value="{{ $data_login->nip }}" >
                            @error('nip')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Tempat, Tanggal lahir</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control" id="tmpt_tgl_lahir" name="tmpt_tgl_lahir" value="{{ $data_login->tmpt_tgl_lahir }}">
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 " for="jenis_kel">Jenis Kelamin
                        </label>
                        <div class="col-md-5 col-sm-9 ">
                            <select class="form-control" id="jenis_kel" name="jenis_kel">
                                <option value="Laki-laki" {{ $data_login->jenis_kel == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $data_login->jenis_kel == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Jenis Kelamin</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control" value="{{ $data_login->jenis_kel }}">
						</div>
                    </div> --}}
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data_login->alamat }}">
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">No Handphone</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ $data_login->no_hp }}">
                            @error('no_hp')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Email</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $data_login->email }}">
                            @error('email')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Agama</label>
						<div class="col-md-5 col-sm-9 ">
							<input type="text" class="form-control" name="agama" id="agama" value="{{ $data_login->agama }}">
						</div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 ">Foto</label>
                        <input type="hidden" name="fotoLama" value="{{ $data_login->foto }}">
						<div class="col-md-5 col-sm-9 ">
                            <img class="foto-preview img-fluid">
							<input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto"  >
                            @error('foto')
                            <div class="invalid-feedback alert-dismissible">
                                {{ $message }}
                             </div>
                             @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3 ">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
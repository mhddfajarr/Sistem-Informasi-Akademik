@extends('TU.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Registrasi Siswa</h3>
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
                <form action="/registrasi/siswa" method="post" class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nama" name="nama"  class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" >
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                             </div>
                             @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nip">NISN <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nip" name="nip"  class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}">
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                             </div>
                             @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelas">Kelas <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="kelas" name="kelas">
                                @foreach ($kelas as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" id="password" name="password"  class="form-control">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
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
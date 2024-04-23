@extends('TU.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Tambah Kelas</h3>
                </span>
            </div>
            <div class="x_content">
                <form action="/tambahKelas" method="post" class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nip">Nama Kelas <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nama_kelas" name="nama_kelas"  class="form-control" value="{{ old('nama_kelas') }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guru_Pengampu">Guru Pengampu<span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="guru_pengampu" name="guru_pengampu">
                                @foreach ($guru as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                                @endforeach
                            </select>
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
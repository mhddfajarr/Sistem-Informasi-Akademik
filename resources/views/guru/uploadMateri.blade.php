@extends('guru.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Upload Materi</h3>
                </span>
            </div>
            <div class="x_content">
                <form action="/uploadMateri" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="catatan">Materi Pelajaran <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="catatan" name="catatan"  class="form-control" value="{{ old('catatan') }}" >
                            @error('catatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                             </div>
                             @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="file">Upload File <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" id="file" name="file"  class="form-control @error('file') is-invalid @enderror">
                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                             </div>
                             @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
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
@endsection
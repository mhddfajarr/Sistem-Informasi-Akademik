@extends('guru.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
                <div class="x_panel" style="margin-top: 8px">
                    <h6 style="color: black;">Nama siswa<span style="margin-left: 6px"></span>: {{ $siswa->nama_siswa }}</h6>
                    <h6 style="color: black;">kelas<span style="margin-left: 57px"></span>:{{ $siswa->kelas->nama_kelas }}</h6><hr>
                    <form action="/updateNilai" method="post" class="form-horizontal form-label-left">
                        @csrf
                        @method('PUT')
                        <input type='hidden' name='siswa_id' value='{{ $siswa->id }}' />
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " for="matematika">Matematika</label>
                            <div class="col-md-3 col-sm-9 ">
                                <input type='hidden' name='mapel' value='1'/>
                                <input type="text" class="form-control" id="matematika" name="Matematika" value="{{ $siswa->nilai }}" >
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " for="fisika">Fisika</label>
                            <div class="col-md-3 col-sm-9 ">
                                <input type='hidden' name='mapel' value='2'/>
                                <input type="text" class="form-control" id="fisika" name="Fisika" >
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " for="kimia">Kimia</label>
                            <div class="col-md-3 col-sm-9 ">
                                <input type='hidden' name='mapel' value='3'/>
                                <input type="text" class="form-control" id="kimia" name="Kimia" >
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " for="biologi">Biologi</label>
                            <div class="col-md-3 col-sm-9 ">
                                <input type='hidden' name='mapel' value='4'/>
                                <input type="text" class="form-control" id="biologi" name="Biologi" >
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " for="sejarah">Sejarah</label>
                            <div class="col-md-3 col-sm-9 ">
                                <input type='hidden' name='mapel' value='5'/>
                                <input type="text" class="form-control" id="sejarah" name="Sejarah" >
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " for="bindo">Bahasa Indonesia</label>
                            <div class="col-md-3 col-sm-9 ">
                                <input type='hidden' name='mapel' value='6'/>
                                <input type="text" class="form-control" id="bindo" name="Indonesia" >
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " for="sosiologi">Sosiologi</label>
                            <div class="col-md-3 col-sm-9 ">
                                <input type='hidden' name='mapel' value='7'/>
                                <input type="text" class="form-control" id="sosiologi" name="Sosiologi" >
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9  ">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
                
            {{-- <div class="x_content">
                <form action="/" method="post" class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nama" name="nama"  class="form-control" value="{{ $siswa->nama_siswa }}" >
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                             </div>
                             @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nip">NIP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nip" name="nip"  class="form-control" value="{{ old('nip') }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
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
            </div> --}}
        </div>
    </div>
  </div>
@endsection
@extends('TU.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Edit Jadwal</h3>
                </span>
            </div>
            <div class="x_content">
                <form action="/editJadwal/{{ $Jadwal->id }}" method="POST" class="form-horizontal form-label-left">
                    @csrf
                    @method('patch')
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="hari">Hari <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="hari" name="hari">
                                <option>{{ $Jadwal->hari }}</option>
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jum'at</option>
                                <option>Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="jam">Jam <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="jam" name="jam">
                                <option>{{ $Jadwal->jam }}</option>
                                <option>08.00 - 09.45</option>
                                <option>10.00 - 11.45</option>
                                <option>11.45 - 13.30</option>
                            </select>
                            @error('jam')
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
                                <option value="{{ $kelas->id }}" {{ $Jadwal->kelas_id == $kelas->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mapel">Mata Pelajaran <span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="mapel" name="mapel">
                                @foreach ($mapel as $mp)
                                <option value="{{ $mp->id }}" {{ $Jadwal->mapel_id == $mp->id ? 'selected' : '' }}>{{ $mp->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="guru_pengampu">Guru Pengampu<span class="red">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="guru_pengampu" name="guru_pengampu">
                                @foreach ($guru as $guru)
                                <option value="{{ $guru->id }}" {{ $Jadwal->guru_id == $guru->id ? 'selected' : '' }}>{{ $guru->nama_guru }}</option>
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
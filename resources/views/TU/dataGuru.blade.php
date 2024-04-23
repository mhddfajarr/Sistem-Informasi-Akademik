@extends('TU.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="page-title">
                <div class="title_left">
                    <h3 style="color: black; margin-left: 5px;">Data Guru</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-10 col-sm-5  form-group pull-right top_search">
                        <form action="/dataGuru" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari guru..." name="search" value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-dark" type="submit">Cari</button>
                            </span>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="x_content">
                <table class="table">
                    @if (session()->has('berhasil'))
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    {{ session('berhasil') }}
                  </div>
                @endif
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data_guru->count())
                        @foreach ($data_guru as $guru)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                @if($guru->foto =='default.png')
                                <td><img src="../img/default.png" width="90" height="110"></td>
                                @else
                                <td><img src="{{ asset('storage/' . $guru->foto) }}" width="90" height="110"></td>
                                @endif
                                <td>{{ $guru->nama_guru }}</td>
                                <td>{{ $guru->nip }}</td>
                                <td>
                                    <a href="/detailGuru/{{ $guru->id }}"><span class="badge badge-info">Info</span></a>
                                    <form action="/hapusGuru/{{ $guru->id }} " method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="badge badge-danger border-0" onclick="return confirm('Apakah yakin data ingin dihapus?')">hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4" style="text-align: center">Data tidak ditemukan</td>
                            </tr>
                          @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
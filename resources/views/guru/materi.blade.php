@extends('guru.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        
        <div class="x_panel">
            <div class="x_title">
                <div class="nav navbar-right panel_toolbox">
                    <li>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/uploadMateri"><button class="btn btn-success">Upload File </button></a>
                        </div></a>
                    </li>
                </div>
                <span>
                    <h3 style="color: black;">Materi Pelajaran</h3>
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
                <table class="table table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materi as $mt)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $mt->catatan }}</td>
                                <td>
                                    <a href="downloadMateri/{{ $mt->id }}"><span class="badge badge-primary">Download</span></a>
                                    <form action="/hapusMateri/{{ $mt->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge badge-danger border-0" onclick="return confirm('Apakah yakin data ingin dihapus?')">hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
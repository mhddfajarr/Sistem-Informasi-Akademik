@extends('siswa.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        
        <div class="x_panel">
            <div class="x_title">
                <span>
                    <h3 style="color: black;">Materi Pelajaran</h3>
                </span>
            </div>

            <div class="x_content">
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
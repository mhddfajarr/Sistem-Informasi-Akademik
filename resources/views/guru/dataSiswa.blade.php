@extends('guru.main')

@section('container')
    <div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="page-title">
                <div class="title_left">
                    <h6 style="color: black;"><b>Data siswa kelas</b><span style="margin-left: 6px"></span><b>:</b> {{ $title }}</h6>
                    <h6 style="color: black;"><b>Wali kelas</b><span style="margin-left: 57px"></span><b>:</b> {{ $wali_kelas->nama_guru }}</h6>
                    <h6 style="color: black;"><b>Jumlah siswa</b><span style="margin-left: 30px"></span><b>:</b> {{ @count($siswa) }}</h6>
                    <br>
                </div>

						<div class="title_right">
							<div class="col-md-10 col-sm-5  form-group pull-right top_search">
                                <form action="/G_dataKelas/{{ $kelas->id }}" method="get">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Cari siswa..." name="search" value="{{ request('search') }}">
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
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nisn</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($siswa->count())
                        @foreach ($siswa as $siswa)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td>{{ $siswa->nip }}</td>
                                <td>{{ $siswa->jenis_kel }}</td>
                                <td>
                                    <a href="/G_detailSiswa/{{ $siswa->id }}"><span class="badge badge-info">Info</span></a>
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
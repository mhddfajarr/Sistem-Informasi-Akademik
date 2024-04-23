<h6 style="color: black;">Data Nilai siswa kelas<span style="margin-left: 6px"></span>: {{ $title }}</h6>
    <h6 style="color: black;">Wali kelas<span style="margin-left: 54px"></span>: {{ $wali_kelas->nama_guru }}</h6>
    <h6 style="color: black;">Jumlah siswa<span style="margin-left: 31px"></span>: {{ $siswa->count() }}</h6> 
        <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        @foreach ($mapel as $mapel)
                        <th>{{ $mapel->nama_mapel }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @if ($siswa->count())
                    @foreach ($siswa as $siswa)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $siswa->nama_siswa }}</td>
                            <td>{{ $siswa->nip }}</td>
                            @foreach ($nilai as $nilais)
                                @if($siswa->id == $nilais->siswa_id)
                                    <td>{{ $nilais->nilai }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    @else
                       <tr>
                            <td colspan="4" style="text-align: center">Data tidak ditemukan</td>
                       </tr>
                    @endif
                </tbody>
            </table>
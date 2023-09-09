@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Nilai {{ $siswa->nama_siswa }}</h1>
            <button class="btn btn-inverse-info"
                onclick="window.location.href='{{ route('nilai.create', ['siswa_id' => $siswa->id]) }}'">
                <i class="bi bi-file-earmark-plus"></i> Input Nilai Siswa</button>
        </div>
        <div class="row" id="read"></div>
        <divc class="card">
            <div class="card-body">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Guru</th>
                            <th scope="col">Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Izin</th>
                            <th scope="col">Sakit</th>
                            <th scope="col">Tanpa Keterangan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($nilai as $s)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->mataPelajaran->nama_matapel }}</td>
                                <td>{{ $s->guru->nama }}</td>
                                <td>{{ $s->siswa->nama_siswa }}</td>
                                <td>{{ $s->kelas->nama_kelas }}</td>
                                <td>{{ $s->semester }}</td>
                                <td>{{ $s->absensi->izin }}</td>
                                <td>{{ $s->absensi->sakit }}</td>
                                <td>{{ $s->absensi->tanpa_keterangan }}</td>
                                <td>{{ $s->absensi->keterangan }}</td>
                                <td>{{ $s->nilai }}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-green-500 text-white hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300"
                                            href="{{ route('nilai.edit', ['id' => $s->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300"
                                            href="{{ route('nilai.destroy', ['id' => $s->id]) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </divc>
    </div>
@endsection
@section('script')
    <script>
        const tb = new DataTable("#tables", {
            responsive: true,
            searching: false,
            info: false,
            ordering: false,
            paging: false
        })
    </script>
@endsection

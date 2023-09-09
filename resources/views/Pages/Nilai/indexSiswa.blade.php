@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Siswa</h1>

        </div>
        <div class="row" id="read"></div>
        <divc class="card">
            <div class="card-body">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Nomor Induk</th>
                            <th scope="col">Panggilan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">kelas</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Status</th>
                            <th scope="col">Lihat Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->nomor_induk }}</td>
                                <td>{{ $s->panggilan }}</td>
                                <td>{{ $s->kelamin }}</td>
                                <td>{{ $s->kelas->nama_kelas ?? '' }}</td>
                                <td>{{ $s->kelas->waliKelas->nama ?? '' }}</td>
                                <td>{{ $s->status }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('nilai-show.index', ['siswa_id' => $s->id]) }}">Lihat Nilai</a>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-green-500 text-white hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300"
                                            href="{{ route('siswa.edit', ['id' => $s->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300"
                                            href="{{ route('siswa.destroy', ['id' => $s->id]) }}">
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

@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Mata Pelajaran</h1>
            <button class="btn btn-inverse-info" onclick="window.location.href='{{ route('mata_pelajaran.create') }}'">
                <i class="bi bi-file-earmark-plus"></i> Tambah Data</button>
        </div>
        <div class="row" id="read"></div>
        <divc class="card">
            <div class="card-body">
                <table class="table " id="tables">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Nama Mata Pelajaran</th>
                            <th scope="col">Alias</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($matapelajaran as $matapel)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $matapel->guru->nama }}</td>
                                <td>{{ $matapel->kelas->nama_kelas }}</td>
                                <td>{{ $matapel->tahun_ajaran }}</td>
                                <td>{{ $matapel->semester }}</td>
                                <td>{{ $matapel->nama_matapel }}</td>
                                <td>{{ $matapel->alias }}</td>
                                <td>{{ $matapel->deskripsi }}</td>
                                <td>{{ $matapel->status }}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-green-500 text-white hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300"
                                            href="{{ route('mata_pelajaran.edit', ['id' => $matapel->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300"
                                            href="{{ route('mata_pelajaran.destroy', ['id' => $matapel->id]) }}">
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
            responsive: true
        })
    </script>
@endsection

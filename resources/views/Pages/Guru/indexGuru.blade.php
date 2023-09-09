@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Guru & Staff</h1>
            <button class="btn btn-inverse-info" onclick="window.location.href='{{ route('guru.create') }}'">
                <i class="bi bi-file-earmark-plus"></i> Tambah Data</button>
        </div>
        <div class="row" id="read"></div>
        <div class="card">
            <div class="card-body">
                <table class="table" id="tables">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">NUPTK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Masa Pensiun</th>
                            <th scope="col">Mulai Bertugas</th>
                            <th scope="col">Gaji Pokok</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($guru as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nuptk }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tempat_lahir }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->masa_pensiun }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->mulai_bertugas)->format('d-m-Y') }}</td>
                                <td>{{ $item->gaji_pokok }}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-green-500 text-white hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300"
                                            href="{{ route('guru.edit', ['id' => $item->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300"
                                            href="{{ route('guru.destroy', ['id' => $item->id]) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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

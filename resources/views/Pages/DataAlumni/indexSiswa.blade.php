@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Alumni</h1>

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
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Kelamin</th>
                            <th scope="col">Agama</th>
                            <th scope="col">TK</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nama Ayah</th>
                            <th scope="col">Nama Ibu</th>
                            <th scope="col">Pekerjaan Ayah</th>
                            <th scope="col">Pekerjaan Ibu</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Kepala Sekolah</th>
                            <th scope="col">Status</th>
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
                                <td>{{ $s->tempat_lahir }}</td>
                                <td>{{ $s->tanggal_lahir }}</td>
                                <td>{{ $s->kelamin }}</td>
                                <td>{{ $s->agama }}</td>
                                <td>{{ $s->tk }}</td>
                                <td>{{ $s->alamat }}</td>
                                <td>{{ $s->nama_ayah }}</td>
                                <td>{{ $s->nama_ibu }}</td>
                                <td>{{ $s->pekerjaan_ayah }}</td>
                                <td>{{ $s->pekerjaan_ibu }}</td>
                                <td>{{ $s->tanggal_masuk }}</td>
                                <td>{{ $s->kepala_sekolah }}</td>
                                <td>{{ $s->status }}</td>

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

@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Operator</h1>
            <a class="btn btn-inverse-info" href="/operator/create" onClick="create()">
                <i class="bi bi-file-earmark-plus"></i> Tambah Data</a>
        </div>
        <div class="row" id="read"></div>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">jabatan</th>
                        <th scope="col">jenis_kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">agama</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($operators as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>
                                <a class="btn-success p-1 mr-1 rounded" href="/operator/{{ $item->id }}/edit"
                                    href=""><i class="bi bi-pencil-square"></i></a>
                                <button class="btn-danger p-1 mr-1 rounded"
                                    onclick="window.location.href='{{ route('operator.destroy', ['id' => $item->id]) }}'"><i
                                        class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

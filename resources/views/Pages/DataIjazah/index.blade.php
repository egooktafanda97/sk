@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">File Ijazah</h1>

        </div>
        <div class="row" id="read"></div>
        <divc class="card">
            <div class="card-body">
                <table class="table" id="tables">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Dokument Ijazah</th>
                            <th scope="col">Dokument</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->status }}</td>
                                <td>
                                    @if (!empty($s->ijazah->id))
                                        <a href="{{ asset($s->ijazah->path ?? '') }}">{{ $s->ijazah->nama_file ?? '' }}</a>
                                        <span class="cursor-pointer hover:text-blue-300 upFile"
                                            data-id="{{ $s->id }}" data-target="#exampleModal" data-toggle="modal">
                                            <i class="fa fa-edit"></i></span>
                                    @else
                                        <button class="btn btn-info btn-sm upFile" data-id="{{ $s->id }}"
                                            data-target="#exampleModal" data-toggle="modal"> <i class="fa fa-upload"></i>
                                            Tambah
                                            Dokument</button>
                                    @endif


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </divc>
    </div>

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Ijazah</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/data-ijazah/store" enctype="multipart/form-data" method="post">
                    <input id="siswa_id" name="siswa_id" type="hidden">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="files">File</label>
                                <input class="form-control" id="files" name="files" required type="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary bg-blue-500" type="submit">Simpan</button>
                        <button class="btn btn-secondary bg-gray-500" onClick="cancel()" type="button">Batal</button>
                    </div>
                </form>
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
        $(".upFile").click(function() {
            $("#siswa_id").val($(this).data("id"))
        })
    </script>
@endsection

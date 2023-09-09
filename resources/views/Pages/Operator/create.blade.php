@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Form Input</h1>
        </div>
        <div class="row" id="read"></div>
        <div>
            <form action="/operator/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="nama">Nama</label>
                        <input class="form-control" id="nama" name="nama" required type="text">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" id="username" name="username" required type="text">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <input class="form-control" id="jabatan" name="jabatan" required type="text">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" required type="text">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="agama">Agama</label>
                        <input class="form-control" id="agama" name="agama" required type="text">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-secondary" onClick="cancel()" type="button">Batal</button>
            </form>
        </div>
    </div>
@endsection

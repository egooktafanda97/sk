@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Form Input</h1>
        </div>
        <div class="row" id="read"></div>
        <div>
            <form action="/operator/{{ $op->id }}/update" method="post">
                @csrf
                <input id="operator_id" name="operator_id" type="hidden">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="nama">Nama</label>
                        <input class="form-control" id="nama" name="nama" required type="text"
                            value="{{ $op->nama }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email" required type="email"
                            value="{{ $op->user->email }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <input class="form-control" id="jabatan" name="jabatan" required type="text"
                            value="{{ $op->jabatan }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" required type="text"
                            value="{{ $op->alamat }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option {{ $op->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">Laki-laki
                            </option>
                            <option {{ $op->jenis_kelamin == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="agama">Agama</label>
                        <select class="form-select" id="agama" name="agama" required>
                            <option {{ $op->agama == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                            <option {{ $op->agama == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                            <option {{ $op->agama == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                            <option {{ $op->agama == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                            <option {{ $op->agama == 'Buddha' ? 'selected' : '' }} value="Buddha">Buddha</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-secondary" onClick="cancel()" type="button">Batal</button>
            </form>
        </div>
    </div>
@endsection

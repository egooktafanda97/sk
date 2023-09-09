@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Form Input Siswa</h1>
        </div>
        <div class="row" id="read"></div>
        <div class="card">
            <div class="card-body">
                <form action="/siswa/store" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input class="form-control" id="nama" name="nama_siswa" required type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="kelas">Kelas</label>
                            <select class="form-select" id="kelas" name="kelas_id" required>
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="nomor_induk">Nomor Induk</label>
                            <input class="form-control" id="nomor_induk" name="nomor_induk" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="panggilan">Panggilan</label>
                            <input class="form-control" id="panggilan" name="panggilan" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                            <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="kelamin">Kelamin</label>
                            <select class="form-select" id="kelamin" name="kelamin">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="agama">Agama</label>
                            <select class="form-select" id="agama" name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="tk">TK</label>
                            <input class="form-control" id="tk" name="tk" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" name="alamat" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="nama_ayah">Nama Ayah</label>
                            <input class="form-control" id="nama_ayah" name="nama_ayah" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="nama_ibu">Nama Ibu</label>
                            <input class="form-control" id="nama_ibu" name="nama_ibu" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" type="text">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                            <input class="form-control" id="tanggal_masuk" name="tanggal_masuk" type="date">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="kepala_sekolah">Kepala Sekolah</label>
                            <input class="form-control" id="kepala_sekolah" name="kepala_sekolah" type="text">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="aktif">Aktif</option>
                                <option value="alumni">Alumni</option>
                                <option value="berhenti">berhenti</option>
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-primary bg-blue-500" type="submit">Submit</button>
                    <button class="btn btn-secondary bg-gray-500" onClick="cancel()" type="button">Batal</button>
                </form>
            </div>
        </div>
    </div>
@endsection

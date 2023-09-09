@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Form Update Siswa</h1>
        </div>
        <div class="row" id="read"></div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input class="form-control" id="nama" name="nama_siswa" required type="text"
                                value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="kelas">Kelas</label>
                            <select class="form-select" id="kelas" name="kelas_id" required>
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $k)
                                    <option {{ old('kelas_id', $siswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}
                                        value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="nomor_induk">Nomor Induk</label>
                            <input class="form-control" id="nomor_induk" name="nomor_induk" type="text"
                                value="{{ old('nomor_induk', $siswa->nomor_induk ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="panggilan">Panggilan</label>
                            <input class="form-control" id="panggilan" name="panggilan" type="text"
                                value="{{ old('panggilan', $siswa->panggilan ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                            <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text"
                                value="{{ old('tempat_lahir', $siswa->tempat_lahir ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date"
                                value="{{ old('tanggal_lahir', $siswa->tanggal_lahir ? $siswa->tanggal_lahir : '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="kelamin">Kelamin</label>
                            <select class="form-select" id="kelamin" name="kelamin">
                                <option {{ old('kelamin', $siswa->kelamin ?? '') == 'Laki-Laki' ? 'selected' : '' }}
                                    value="Laki-Laki">Laki-Laki</option>
                                <option {{ old('kelamin', $siswa->kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}
                                    value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="agama">Agama</label>
                            <select class="form-select" id="agama" name="agama">
                                <option {{ old('agama', $siswa->agama ?? '') == 'Islam' ? 'selected' : '' }}
                                    value="Islam">Islam</option>
                                <option {{ old('agama', $siswa->agama ?? '') == 'Kristen' ? 'selected' : '' }}
                                    value="Kristen">Kristen</option>
                                <option {{ old('agama', $siswa->agama ?? '') == 'Katolik' ? 'selected' : '' }}
                                    value="Katolik">Katolik</option>
                                <option {{ old('agama', $siswa->agama ?? '') == 'Hindu' ? 'selected' : '' }}
                                    value="Hindu">Hindu</option>
                                <option {{ old('agama', $siswa->agama ?? '') == 'Buddha' ? 'selected' : '' }}
                                    value="Buddha">Buddha</option>
                                <option {{ old('agama', $siswa->agama ?? '') == 'Konghucu' ? 'selected' : '' }}
                                    value="Konghucu">Konghucu</option>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="tk">TK</label>
                            <input class="form-control" id="tk" name="tk" type="text"
                                value="{{ old('tk', $siswa->tk ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <input class="form-control" id="alamat" name="alamat" type="text"
                                value="{{ old('alamat', $siswa->alamat ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="nama_ayah">Nama Ayah</label>
                            <input class="form-control" id="nama_ayah" name="nama_ayah" type="text"
                                value="{{ old('nama_ayah', $siswa->nama_ayah ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="nama_ibu">Nama Ibu</label>
                            <input class="form-control" id="nama_ibu" name="nama_ibu" type="text"
                                value="{{ old('nama_ibu', $siswa->nama_ibu ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" type="text"
                                value="{{ old('pekerjaan_ayah', $siswa->pekerjaan_ayah ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" type="text"
                                value="{{ old('pekerjaan_ibu', $siswa->pekerjaan_ibu ?? '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                            <input class="form-control" id="tanggal_masuk" name="tanggal_masuk" type="date"
                                value="{{ old('tanggal_masuk', $siswa->tanggal_masuk ? $siswa->tanggal_masuk : '') }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="kepala_sekolah">Kepala Sekolah</label>
                            <input class="form-control" id="kepala_sekolah" name="kepala_sekolah" type="text"
                                value="{{ old('kepala_sekolah', $siswa->kepala_sekolah ?? '') }}">
                        </div>
                    </div>

                    <div class="w-full flex justify-end items-center">
                        <button class="btn btn-primary bg-blue-500" type="submit">Submit</button>
                        <button class="btn btn-secondary bg-gray-500 ml-2" onClick="cancel()"
                            type="button">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

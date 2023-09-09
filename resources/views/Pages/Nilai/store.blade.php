@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h1 class="h4 mb-3">Form Input Nilai Siswa</h1>
                <div><strong class="text-blue-500">{{ $siswas->nama_siswa }}</strong></div>
            </div>
        </div>
        <div class="row" id="read"></div>
        <div class="card">
            <div class="card-body">
                <form action="/nilai/store" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="mata_pelajaran_id">Mata Pelajaran</label>
                            <select class="form-select" id="mata_pelajaran_id" name="mata_pelajaran_id" required>
                                <option disabled selected value="">Pilih Mata Pelajaran</option>
                                @foreach ($matapelajarans as $matapelajaran)
                                    <option value="{{ $matapelajaran->id }}">{{ $matapelajaran->nama_matapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (empty($findguru))
                            <div class="col-6 mb-3">
                                <label class="form-label" for="guru_id">Guru</label>
                                <select class="form-select" id="guru_id" name="guru_id" required>
                                    <option disabled selected value="">Pilih Guru</option>
                                    @foreach ($gurus as $guru)
                                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div class="col-6 mb-3">
                                <input name="guru_id" type="hidden" value="{{ $findguru->id }}">
                                <label class="form-label" for="nama_matapel">nama Guru</label>
                                <input class="form-control" disabled type="text" value="{{ $findguru->nama }}">
                            </div>
                        @endif
                    </div>

                    <div class="row">

                        <div class="col-6 mb-3">
                            <input name="siswa_id" type="hidden" value="{{ $siswas->id }}">
                            <label class="form-label" for="nama_matapel">Nama Siswa</label>
                            <input class="form-control" disabled type="text" value="{{ $siswas->nama_siswa }}">
                        </div>

                        <div class="col-6 mb-3">
                            <label class="form-label" for="kelas_id">Kelas</label>
                            <select class="form-select" id="kelas_id" name="kelas_id" required>
                                <option disabled selected value="">Pilih Kelas</option>
                                @foreach ($kelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="semester">Semester</label>
                            <select class="form-select" id="semester" name="semester" required>
                                <option disabled selected value="">Pilih Semester</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="nilai">Nilai</label>
                            <input class="form-control" id="nilai" max="100" min="0" name="nilai" required
                                type="number">
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="card p-2">
                            <div class="card-header">
                                <strong>Absensi</strong>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="izin">Izin</label>
                                    <input class="form-control" id="izin" max="100" min="0" name="izin"
                                        required type="number">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="sakit">Sakit</label>
                                    <input class="form-control" id="sakit" max="100" min="0" name="sakit"
                                        required type="number">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="tanpa_keterangan">Tanpa Keterangan (alfa)</label>
                                    <input class="form-control" id="tanpa_keterangan" max="100" min="0"
                                        name="tanpa_keterangan" required type="number">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="keterangan">Keterangan</label>
                                    <textarea class="form-control" cols="1" id="" name="keterangan" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 text-right">
                        <button class="btn btn-primary bg-blue-500" type="submit">Simpan</button>
                        <button class="btn btn-secondary bg-gray-500" onClick="cancel()" type="button">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

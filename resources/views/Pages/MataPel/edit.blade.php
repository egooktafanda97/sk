@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Form Update Siswa</h1>
        </div>
        <div class="row" id="read"></div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mata_pelajaran.update', $matapelajaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="guru_id">Guru</label>
                            <select class="form-select text-gray-900" id="guru_id" name="guru_id" required>
                                <option disabled value="">Pilih Guru</option>
                                @foreach ($guru as $gx)
                                    <option {{ $gx->id == $matapelajaran->guru_id ? 'selected' : '' }}
                                        value="{{ $gx->id }}">
                                        {{ $gx->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="kelas_id">Kelas</label>
                            <select class="form-select" id="kelas_id" name="kelas_id" required>
                                <option disabled value="">Pilih Kelas</option>
                                @foreach ($kelas as $kelas)
                                    <option {{ $kelas->id == $matapelajaran->kelas_id ? 'selected' : '' }}
                                        value="{{ $kelas->id }}">
                                        {{ $kelas->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="tahun_ajaran">Tahun Ajaran</label>
                            <select class="form-select" id="tahun_ajaran" name="tahun_ajaran" required>
                                <option disabled value="">Pilih Tahun Ajaran</option>
                                @for ($year = date('Y'); $year <= date('Y') + 5; $year++)
                                    <option {{ $year . '/' . $year + 1 == $matapelajaran->tahun_ajaran ? 'selected' : '' }}
                                        value="{{ $year }}/{{ $year + 1 }}">
                                        {{ $year }}/{{ $year + 1 }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="semester">Semester</label>
                            <select class="form-select" id="semester" name="semester" required>
                                <option disabled value="">Pilih Semester</option>
                                <option {{ $matapelajaran->semester == 'I' ? 'selected' : '' }} value="I">I</option>
                                <option {{ $matapelajaran->semester == 'II' ? 'selected' : '' }} value="II">II</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="nama_matapel">Nama Mata Pelajaran</label>
                            <input class="form-control" id="nama_matapel" name="nama_matapel" required type="text"
                                value="{{ $matapelajaran->nama_matapel }}">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="alias">Alias</label>
                            <input class="form-control" id="alias" name="alias" required type="text"
                                value="{{ $matapelajaran->alias }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $matapelajaran->deskripsi }}</textarea>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option disabled value="">Pilih Status</option>
                                <option {{ $matapelajaran->status == 'Active' ? 'selected' : '' }} value="Active">Sedang
                                    berjalan</option>
                                <option {{ $matapelajaran->status == 'inActive' ? 'selected' : '' }} value="inActive">Sudah
                                    Lewat</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-full flex justify-end items-center">
                        <button class="btn btn-primary bg-blue-500" type="submit">Submit</button>
                        <button class="btn btn-secondary bg-gray-500 ml-2" onClick="cancel()" type="button">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

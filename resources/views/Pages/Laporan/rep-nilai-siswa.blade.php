@extends('Layout.main')
@section('content')
    @php
        $getKls = request()->get('kelas') ?? '';
        $getSemester = request()->get('semester') ?? '';
    @endphp
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Nilai {{ $siswa->nama_siswa }}</h1>
            <a class="btn btn-inverse-secondary"
                href="/laporan/{{ $siswa->id }}/print-nilai?kelas={{ $getKls }}&semester={{ $getSemester }}"
                id="prints" target="_blank">
                <i class="fa fa-print"></i> print</a>
        </div>
        <div class="row" id="read"></div>
        <divc class="card">
            <div class="card-header flex justify-content-between">
                <div></div>
                <form action="" class="flex" method="get">
                    <select class="form-select ml-1 mr-1" id="kelas_id" name="kelas">
                        <option disabled selected value="">Pilih Kelas</option>
                        @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">Kelas {{ $kls->nama_kelas }}</option>
                        @endforeach
                    </select>
                    <select class="form-select  w-[150px]" id="semester" name="semester">
                        <option disabled selected value="">Pilih Semester</option>
                        <option value="I">Semester I</option>
                        <option value="II">Semester II</option>
                    </select>
                    <div>
                        <button
                            class="w-10 h-10 ml-1 mr-1 flex items-center justify-center rounded-full bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300"
                            type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Guru</th>
                            <th scope="col">Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Izin</th>
                            <th scope="col">Sakit</th>
                            <th scope="col">Tanpa Keterangan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($nilai as $s)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->mataPelajaran->nama_matapel }}</td>
                                <td>{{ $s->guru->nama }}</td>
                                <td>{{ $s->siswa->nama_siswa }}</td>
                                <td>{{ $s->kelas->nama_kelas }}</td>
                                <td>{{ $s->semester }}</td>
                                <td>{{ $s->absensi->izin }}</td>
                                <td>{{ $s->absensi->sakit }}</td>
                                <td>{{ $s->absensi->tanpa_keterangan }}</td>
                                <td>{{ $s->absensi->keterangan }}</td>
                                <td>{{ $s->nilai }}</td>
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
            responsive: true,
            searching: false,
            info: false,
            ordering: false,
            paging: false
        })
    </script>
@endsection

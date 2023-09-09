@extends('Layout.main')
@section('content')
    @php
        $getKls = request()->get('kelas') ?? '';
        $getSiswa = request()->get('siswa') ?? '';
    @endphp
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Siswa</h1>
            <div>
                <a class="btn btn-inverse-secondary"
                    href="/laporan/print-siswa?kelas={{ $getKls }}&status={{ $getSiswa }}" id="prints"
                    target="_blank">
                    <i class="fa fa-print"></i> print</a>
            </div>
        </div>
        <div class="row" id="read"></div>
        <div class="card">
            <div class="card-header flex justify-content-between">
                <div></div>
                <form action="" class="flex" method="get">
                    <select class="form-select ml-1 mr-1" id="kelas_id" name="kelas">
                        <option disabled selected value="">Pilih Kelas</option>
                        @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                        @endforeach
                    </select>
                    <select class="form-select w-[150px] ml-1 mr-1" id="kelas_id" name="status" name="kelas_id">
                        <option disabled selected value="">Status Siswa</option>
                        <option value="aktif">Aktif</option>
                        <option value="alumni">Alumni</option>
                        <option value="berhenti">Berhenti</option>
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
                <table class="table" id="tables">
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
                            <th scope="col">Aksi</th>
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
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-green-500 text-white hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300"
                                            href="{{ route('siswa.edit', ['id' => $s->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="w-9 h-9 ml-1 mr-1 flex items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300"
                                            href="{{ route('siswa.destroy', ['id' => $s->id]) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
    </script>
@endsection

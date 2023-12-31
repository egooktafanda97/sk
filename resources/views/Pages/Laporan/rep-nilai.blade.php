@extends('Layout.main')
@section('content')
    @php
        $getKls = request()->get('kelas') ?? '';
        $getSatus = request()->get('status') ?? '';
        $getNama = request()->get('nama') ?? '';
    @endphp
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Siswa</h1>
            <div>
                <a class="btn btn-inverse-secondary"
                    href="/laporan/print-siswa?kelas={{ $getKls }}&status={{ $getSatus }}&nama={{ $getNama }}"
                    id="prints" target="_blank">
                    <i class="fa fa-print"></i> print</a>
            </div>
        </div>
        <div class="row" id="read"></div>
        <div class="card">
            <div class="card-header flex justify-content-between">
                <div></div>
                <form action="" class="flex" method="get">
                    <input class="form-control w-[150px] ml-1 mr-1" id="nama" name="nama" />
                    <select class="form-select ml-1 mr-1" id="kelas_id" name="kelas">
                        <option disabled selected value="">Pilih Kelas</option>
                        @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                        @endforeach
                    </select>
                    <select class="form-select w-[150px] ml-1 mr-1" id="status" name="status">
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
                            <th scope="col">Kelas</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->nomor_induk }}</td>
                                <td>{{ $s->kelas->nama_kelas }}</td>
                                <td>{{ $s->status }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm upFile"
                                        href="{{ route('laporan-nilai', ['id' => $s->id]) }}">
                                        Lihat Nilai</a>
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

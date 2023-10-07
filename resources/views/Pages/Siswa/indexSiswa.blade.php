@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Siswa</h1>
            <div class="flex">
                <div class="flex justify-end items-center mb-2">
                    <label class="mr-2" for="kelas">Pilih Kelas:</label>

                    <select class="w-[200px] mr-2 form-control form-control-sm" id="kelas-filter" name="kelas">
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelas as $kelasx)
                            <option value="{{ $kelasx->id }}">Kelas {{ $kelasx->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-inverse-info" onclick="window.location.href='{{ route('siswa.create') }}'">
                    <i class="bi bi-file-earmark-plus"></i> Tambah Data</button>
            </div>
        </div>

        <div class="row" id="read"></div>
        <divc class="card">
            <div class="card-body">
                <div class="hidden" id="update-kelas">
                    <div class="flex justify-end items-center mb-2">
                        <label class="mr-2" for="kelas">Pilih Kelas:</label>

                        <select class="w-[200px] mr-2 form-control form-control-sm" id="kelas-update" name="kelas-update">
                            <option value="">Pilih Kelas Perubahan</option>
                            @foreach ($kelas as $kelas)
                                <option value="{{ $kelas->id }}">Kelas {{ $kelas->nama_kelas }}</option>
                            @endforeach
                            <option value="lulus">LULUS</option>
                        </select>
                        <button class="btn btn-primary bg-blue-500 update-btn h-[100%]" type="button">Simpan</button>
                    </div>
                </div>

                <table class="table table-bordered" id="tables">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">
                                <input id="checkAll" type="checkbox">
                            </th>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
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
                            <tr data-id="{{ $s->id }}">
                                <td>
                                    <input class="checkbox" type="checkbox">
                                </td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->kelas->nama_kelas ?? '' }}</td>
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
        </divc>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const tb = new DataTable("#tables", {
            responsive: true
        })
        $(document).ready(function() {
            // Ketika checkbox "check all" diubah statusnya
            $("#checkAll").change(function() {
                if ($(this).prop("checked"))
                    $("#update-kelas").show();
                else
                    $("#update-kelas").hide();
                $(".checkbox").prop('checked', $(this).prop("checked"));
            });

            // Ketika salah satu checkbox dalam tabel diubah statusnya
            $(".checkbox").change(function() {

                if ($(".checkbox:checked").length === $(".checkbox").length) {
                    $("#checkAll").prop('checked', true);
                    $("#update-kelas").show();
                } else {
                    $("#update-kelas").hide();
                    $("#checkAll").prop('checked', false);
                }
            });
        });

        $(".update-btn").click(function() {
            var selectedIds = [];

            // Loop melalui semua checkbox yang dicentang
            $(".checkbox:checked").each(function() {
                selectedIds.push($(this).closest("tr").data("id"));
            });
            const updates = async () => {
                const data = await axios.post("/siswa/update-kelas", {
                    kelas: $("#kelas-update").val(),
                    data: selectedIds
                }).catch((err) => {
                    swal("Oops!", "gagal Update kelas!", "error", {
                        button: "ok!",
                    });
                })
                if (data) {
                    window.location.reload();
                }
            }
            updates();
        });
        $("#kelas-filter").change(function() {

            var id = $(this).val()
            window.location.href = "/siswa?kelas=" + id
        })
    </script>
@endsection

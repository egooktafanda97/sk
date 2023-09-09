@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Form Input</h1>
        </div>
        <div class="row" id="read"></div>
        <div>
            <form action="/guru/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="nama">Nama</label>
                        <input class="form-control" id="nama" name="nama" required type="text">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="nuptk">NUPTK (Nomor Induk Pegawai)</label>
                        <input class="form-control" id="nuptk" name="nuptk" type="text">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                        <input class="form-control" id="tempat_lahir" name="tempat_lahir" required type="text">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                        <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" required type="date">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <input class="form-control" id="jabatan" name="jabatan" required type="text">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="no_hp">Nomor HP</label>
                        <input class="form-control" id="no_hp" name="no_hp" type="text">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" type="text">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="agama">Agama</label>
                        <select class="form-control" id="agama" name="agama">
                            <option value="">Pilih Agama</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="buddha">Buddha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="masa_pensiun">Masa Pensiun</label>
                        <input class="form-control" id="masa_pensiun" name="masa_pensiun" type="text">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="mulai_bertugas">Mulai Bertugas</label>
                        <input class="form-control" id="mulai_bertugas" name="mulai_bertugas" type="date">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="gaji_pokok">Gaji Pokok</label>
                        <input class="form-control" id="gaji_pokok" name="gaji_pokok" type="text">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email" required type="email">
                    </div>


                    <div class="col-6 mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" id="password" name="password" required type="password">
                    </div>
                </div>
                <button class="btn btn-primary bg-blue-500" type="submit">Submit</button>
                <button class="btn btn-secondary bg-gray-500" onClick="cancel()" type="button">Batal</button>
            </form>
        </div>
    </div>
@endsection
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script>
    $(function() {
        $('#tanggal_lahir').datepicker({
            format: 'dd-mm-yyyy  '
        });
    });
</script>

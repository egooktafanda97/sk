@extends('Layout.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4 mb-3">Form Input</h1>
        </div>
        <div class="row" id="read"></div>
        <div>
            <form action="/guru/{{ $guru->id }}/update" method="post">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="nama">Nama</label>
                        <input class="form-control" id="nama" name="nama" required type="text"
                            value="{{ isset($guru) ? $guru->nama : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="nuptk">NUPTK (Nomor Induk Pegawai)</label>
                        <input class="form-control" id="nuptk" name="nuptk" type="text"
                            value="{{ isset($guru) ? $guru->nuptk : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                        <input class="form-control" id="tempat_lahir" name="tempat_lahir" required type="text"
                            value="{{ isset($guru) ? $guru->tempat_lahir : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                        <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" required type="date"
                            value="{{ isset($guru) ? $guru->tanggal_lahir : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <input class="form-control" id="jabatan" name="jabatan" required type="text"
                            value="{{ isset($guru) ? $guru->jabatan : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="no_hp">Nomor HP</label>
                        <input class="form-control" id="no_hp" name="no_hp" type="text"
                            value="{{ isset($guru) ? $guru->no_hp : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="alamat">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" type="text"
                            value="{{ isset($guru) ? $guru->alamat : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option {{ isset($guru) && $guru->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}
                                value="Laki-Laki">Laki-Laki</option>
                            <option {{ isset($guru) && $guru->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}
                                value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="agama">Agama</label>
                        <select class="form-control" id="agama" name="agama">
                            <option {{ isset($guru) && $guru->agama == '' ? 'selected' : '' }} value="">Pilih Agama
                            </option>
                            <option {{ isset($guru) && $guru->agama == 'islam' ? 'selected' : '' }} value="islam">Islam
                            </option>
                            <option {{ isset($guru) && $guru->agama == 'kristen' ? 'selected' : '' }} value="kristen">
                                Kristen
                            </option>
                            <option {{ isset($guru) && $guru->agama == 'katolik' ? 'selected' : '' }} value="katolik">
                                Katolik
                            </option>
                            <option {{ isset($guru) && $guru->agama == 'hindu' ? 'selected' : '' }} value="hindu">Hindu
                            </option>
                            <option {{ isset($guru) && $guru->agama == 'buddha' ? 'selected' : '' }} value="buddha">Buddha
                            </option>
                            <option {{ isset($guru) && $guru->agama == 'konghucu' ? 'selected' : '' }} value="konghucu">
                                Konghucu</option>
                        </select>
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="masa_pensiun">Masa Pensiun</label>
                        <input class="form-control" id="masa_pensiun" name="masa_pensiun" type="text"
                            value="{{ isset($guru) ? $guru->masa_pensiun : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="mulai_bertugas">Mulai Bertugas</label>
                        <input class="form-control" id="mulai_bertugas" name="mulai_bertugas" type="date"
                            value="{{ isset($guru) ? $guru->mulai_bertugas : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="gaji_pokok">Gaji Pokok</label>
                        <input class="form-control" id="gaji_pokok" name="gaji_pokok" type="text"
                            value="{{ isset($guru) ? $guru->gaji_pokok : '' }}">
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email" required type="email"
                            value="{{ $guru->user->email ?? '' }}">
                    </div>


                    <div class="col-6 mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password">
                    </div>
                </div>
                <button class="btn btn-primary bg-blue-500" type="submit">Submit</button>
                <button class="btn btn-secondary bg-gray-500" onClick="window.location.reload()"
                    type="button">Batal</button>
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

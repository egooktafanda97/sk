<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <style>
        @media print {

            /* CSS untuk mengatur tampilan saat dicetak */
            body {
                padding: 20px;
                font-family: Arial, sans-serif;
            }

            @page {
                size: landscape
            }

            #table {
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 20px;
            }

            #table th,
            #table td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }

            #table th {
                background-color: #f2f2f2;
            }
        }

        /* CSS tambahan untuk desain tabel */
        #table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0 auto;
            width: 100%;
        }

        #table th,
        #table td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        #table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        #table td {
            text-align: left;
        }
    </style>
</head>

<body>
    <table class="table table-borderless text-center"
        style="border-width:0px!important; border:none; text-align:center; width:100%">
        <tbody>
            <tr>
                <td>
                    <h4>...<br />
                        KECAMATAN ..<br />
                        ...</h4>

                    <p style="margin-left:0px; margin-right:0px">Alamat : Taluk Kuantan, Kode Pos : 29295, No. Telp :
                        628765355353</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div
        style="background:#000000; cursor:text; height:4px; margin-bottom:0px; margin-left:0px; margin-right:0px; margin-top:0px; width:100%">
        &nbsp;</div>

    <div style="background:#000000; cursor:text; height:2px; margin-top:2px; width:100%">&nbsp;</div>

    <table class="table" id="table">
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
                </tr>
            @endforeach
        </tbody>
    </table>

    </table>
    <script>
        window.print();
    </script>
</body>

</html>

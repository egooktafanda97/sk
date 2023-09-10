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

    </table>
    <script>
        window.print();
    </script>
</body>

</html>

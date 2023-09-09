<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswas = [
            [
                'kelas_id' => 1,
                'nama_siswa' => 'Ani Siswa',
                'nomor_induk' => '1234567890',
                'panggilan' => 'Ani',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2005-03-10',
                'kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'tk' => 'TK Budi Mulia',
                'alamat' => 'Jl. Siswa No. 1',
                'nama_ayah' => 'Budi Ayah',
                'nama_ibu' => 'Siti Ibu',
                'pekerjaan_ayah' => 'Pegawai Swasta',
                'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                'tanggal_masuk' => '2012-07-15',
                'kepala_sekolah' => 'Siti Kepala',
                'status' => 'alumni',
            ],
            [
                'kelas_id' => 2,
                'nama_siswa' => 'Budi Siswa',
                'nomor_induk' => '0987654321',
                'panggilan' => 'Budi',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2006-06-20',
                'kelamin' => 'Laki-laki',
                'agama' => 'Kristen',
                'tk' => 'TK Cerdas',
                'alamat' => 'Jl. Pelajar No. 2',
                'nama_ayah' => 'John Ayah',
                'nama_ibu' => 'Jane Ibu',
                'pekerjaan_ayah' => 'Dosen',
                'pekerjaan_ibu' => 'Guru',
                'tanggal_masuk' => '2013-09-05',
                'kepala_sekolah' => 'John Kepala',
                'status' => 'aktif',
            ],
            // Tambahkan data siswa lainnya sesuai kebutuhan
        ];
        Siswa::insert($siswas);
    }
}

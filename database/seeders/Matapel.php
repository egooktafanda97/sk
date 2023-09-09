<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Matapel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matapelajarans = [
            [
                'guru_id' => 1,
                'kelas_id' => 1,
                'tahun_ajaran' => '2023/2024',
                'semester' => 'I',
                'nama_matapel' => 'Matematika',
                'alias' => 'Mat',
                'deskripsi' => 'Mata pelajaran Matematika',
                'status' => 'Aktif',
            ],
            [
                'guru_id' => 2,
                'kelas_id' => 2,
                'tahun_ajaran' => '2023/2024',
                'semester' => 'II',
                'nama_matapel' => 'Bahasa Inggris',
                'alias' => 'BI',
                'deskripsi' => 'Mata pelajaran Bahasa Inggris',
                'status' => 'Aktif',
            ],
            // Tambahkan data matapelajaran lainnya sesuai kebutuhan
        ];
        MataPelajaran::insert($matapelajarans);
    }
}

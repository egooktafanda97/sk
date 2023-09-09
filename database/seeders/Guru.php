<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru as GuruModel;

class Guru extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gurus = [
            [
                'user_id' => 1,
                'nama' => 'John Doe',
                'nuptk' => '1234567890',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-15',
                'jabatan' => 'Guru Matematika',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Contoh No. 123',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'masa_pensiun' => '2050-01-15',
                'mulai_bertugas' => '2010-01-15',
                'gaji_pokok' => 8000000, // Gaji dalam satuan Rupiah
            ],
            [
                'user_id' => 2,
                'nama' => 'Jane Smith',
                'nuptk' => '0987654321',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1988-05-20',
                'jabatan' => 'Guru Bahasa Inggris',
                'no_hp' => '081234567891',
                'alamat' => 'Jl. Contoh No. 456',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Kristen',
                'masa_pensiun' => '2048-05-20',
                'mulai_bertugas' => '2008-05-20',
                'gaji_pokok' => 7500000, // Gaji dalam satuan Rupiah
            ],
            // Tambahkan data guru lainnya sesuai kebutuhan
        ];
        GuruModel::insert($gurus);
    }
}

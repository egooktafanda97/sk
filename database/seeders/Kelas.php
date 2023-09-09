<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas as KelasModel;

class Kelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KelasModel::insert([
            [
                "wali_user_id" => 1,
                "nama_kelas" => "I"
            ],
            [
                "wali_user_id" => 2,
                "nama_kelas" => "II"
            ],
            [
                "wali_user_id" => 3,
                "nama_kelas" => "III"
            ],
            [
                "wali_user_id" => 4,
                "nama_kelas" => "IV"
            ],
            [
                "wali_user_id" => 5,
                "nama_kelas" => "V"
            ],
            [
                "wali_user_id" => 6,
                "nama_kelas" => "VI"
            ],
        ]);
    }
}

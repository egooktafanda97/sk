<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";

    protected $fillable = [
        'kelas_id',
        'nama_siswa',
        'nomor_induk',
        'panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'kelamin',
        'agama',
        'tk',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'tanggal_masuk',
        'kepala_sekolah',
        "status"
    ];

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }

    public function ijazah()
    {
        return $this->belongsTo(DataIjazah::class,  'id', 'siswa_id');
    }
}

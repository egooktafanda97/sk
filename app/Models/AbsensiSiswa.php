<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    use HasFactory;

    protected $table = 'absensi_siswa';

    protected $fillable = [
        'nulai_id',
        'izin',
        'sakit',
        'tanpa_keterangan',
        'keterangan',
    ];

    public function nulai()
    {
        return $this->belongsTo(Nilai::class, 'nulai_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = "nilai";
    protected $fillable = [
        'mata_pelajaran_id', 'guru_id', 'siswa_id', 'kelas_id', 'semester', 'nilai',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function absensi()
    {
        return $this->belongsTo(AbsensiSiswa::class, 'id', 'nilai_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = "mata_pelajaran";
    protected $fillable = [
        'guru_id',
        'kelas_id',
        'tahun_ajaran',
        'semester',
        'nama_matapel',
        'alias',
        'deskripsi',
        'status',
    ];

    // Relasi ke model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    // Relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}

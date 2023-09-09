<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataIjazah extends Model
{
    use HasFactory;

    protected $table = 'data_ijazah';

    protected $fillable = [
        'siswa_id',
        'nama_file',
        'path',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}

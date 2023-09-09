<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = "gurus";

    protected $fillable = [
        'user_id',
        'nama',
        'nuptk',
        'tempat_lahir',
        'tanggal_lahir',
        'jabatan',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'agama',
        'masa_pensiun',
        'mulai_bertugas',
        'gaji_pokok',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

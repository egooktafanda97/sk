<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $table = "guru";
    protected $fillable = [
        'user_id', 'nama_arsip', 'jenis_arsip', 'path', 'mime_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

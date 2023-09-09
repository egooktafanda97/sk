<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $table = "operator";

    protected $fillable = [
        'user_id', 'nama', 'username', 'jabatan', 'alamat', 'jenis_kelamin', 'agama',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjaPraktek extends Model
{
    protected $table = 'table_sidang_kp';
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'pembimbing',
        'judul_kp',
        'file_kp',
        'status_kp'
    ];
}

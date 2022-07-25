<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semhas extends Model
{
    protected $table = 'table_sidang_kp';
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'pembimbing_satu',
        'pembimbing_dua',
        'judul_skripsi',
        'file_skripsi',
        'status_skripsi'
    ];
}

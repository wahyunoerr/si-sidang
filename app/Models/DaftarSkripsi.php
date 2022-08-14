<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarSkripsi extends Model
{
    protected $table = 'tbl_daftar_skripsi';
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'pembimbing_satu',
        'pembimbing_dua',
        'judul_skripsi'
    ];
}

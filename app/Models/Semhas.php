<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semhas extends Model
{
    protected $table = 'table_sidang_semhas';
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'pembimbing_satu',
        'pembimbing_dua',
        'judul_skripsi',
        'file_skripsi',
        'status_skripsi',
        'tanggal_sidang',
        'waktu_mulai',
        'waktu_selesai',
        'penguji_1',
        'penguji_2',
        'ketua_sidang'
    ];
}

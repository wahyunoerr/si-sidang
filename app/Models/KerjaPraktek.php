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
        'status_kp',
        'foto_transaksi',
        'tanggal_sidang',
        'waktu_mulai',
        'waktu_selesai',
        'penguji_1',
        'penguji_2',
        'ketua_sidang'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sempro extends Model
{
    protected $table = 'table_sidang_proposal';
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'pembimbing_satu',
        'pembimbing_dua',
        'judul_proposal',
        'file_proposal',
        'status_proposal',
        'tanggal_sidang',
        'waktu_mulai',
        'waktu_selesai',
        'ketua_sidang',
        'penguji_1',
        'penguji_2',
        'ketua_sidang',
        'catatan_revisi',
        'catatan_revisi2'
    ];
}
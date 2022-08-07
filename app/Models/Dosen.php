<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Dosen extends Model
{
    protected $table = 'tbl_dosen';
    protected $fillable = [
        'nip',
        'nama'
    ];
}

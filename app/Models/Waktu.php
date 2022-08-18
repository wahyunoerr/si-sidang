<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{

    protected $table = "table_waktu";

    protected $fillable = [
        'waktu_mulai',
        'waktu_selesai'
    ];
}
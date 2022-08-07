<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;


class KP extends Model
{
    protected $table = 'tbl_kp';
    protected $fillable =[
        'nama_mahasiswa',
        'dosbing'
    ];


    public function getUser(){
        $data = DB::table('tbl_kp')
        ->join('users', 'users.id', '=', 'tbl_kp.nama_mahasiswa')
        ->join('users', 'users.id', '=', 'tbl_kp.nama_mahasiswa')
        ->select('users.*','tbl_kp.nama_mahasiswa','tbl_kp.dosbing')
        ->get();

        return $data;
    }
  
}
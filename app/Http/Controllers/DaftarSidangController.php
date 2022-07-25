<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarSidangController extends Controller
{
    public function index(){
        return view('mahasiswa.daftar_sidang.index');
    }
}

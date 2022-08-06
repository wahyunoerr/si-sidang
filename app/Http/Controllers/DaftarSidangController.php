<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DaftarSidangController extends Controller
{
    public function index(){
        $user = User::role('dosen')->get();
        return view('mahasiswa.daftar_sidang.index', compact('user'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index(){
        return view('admin.pendaftar.index');
    }
}

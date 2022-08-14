<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarKpController extends Controller
{
    public function index(){

        return view('admin.daftar_kp.index');
    }


    public function store(Request $request){
        $request->validate([

        ])
    }
}

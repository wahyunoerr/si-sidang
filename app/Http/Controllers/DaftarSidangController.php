<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KerjaPraktek;
use App\Models\DaftarSkripsi;
use Auth;

class DaftarSidangController extends Controller
{
    public function index(){
        $user = User::role('dosen')->get();
        $usr = DaftarSkripsi::where('nama_lengkap', Auth::user()->name)->first();
        return view('mahasiswa.daftar_sidang.index', compact('user','usr'));
    }

    public function simpankp(Request $request){
        $request->validate([
            'dospem1' => 'required',
            'judul_kp' => 'required',
            'file_kp' => 'required',
        ]);

        KerjaPraktek::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nim' => $request->nim,
            'pembimbing' => $request->dospem1,
            'judul_kp' => $request->judul_kp,
            
        ]);

        echo json_encode(["status" => TRUE]);
    }
    
}
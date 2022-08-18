<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KerjaPraktek;
use App\Models\DaftarSkripsi;
use App\Models\Sempro;
use Auth;

class DaftarSidangController extends Controller
{
    public function index(){
        $user = Sempro::where('nim',Auth::user()->serial_user)->first();
        $usr = DaftarSkripsi::where('nama_lengkap', Auth::user()->name)->first();
        return view('mahasiswa.daftar_sidang.index', compact('usr','user'));
    }

    public function simpankp(Request $request){
        $request->validate([
            'nama_lengkap' => 'required|unique:table_sidang_proposal',
            'dospem1' => 'required',
            'judul_kp' => 'required',
            'file_kp' => 'required',
        ],[
            'nama_lengkap.unique' => "Anda Sudah Mendaftar Silahkan Cek Ke Bagian Jadwal"
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
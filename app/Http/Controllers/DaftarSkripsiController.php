<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DaftarSkripsi;
use Auth;

class DaftarSkripsiController extends Controller
{
    public function index(){
        $data = DaftarSkripsi::where('nama_lengkap', Auth::user()->name)->first();
        $user = User::role('dosen')->get();
        return view('mahasiswa.daftar_sidang.skripsi.index', compact('user','data'));
    }

    public function simpansk(Request $request){
        $request->validate([
            'dospem1' => 'required',
            'dospem2' => 'required|different:dospem1',
        ]);

        DaftarSkripsi::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'pembimbing_satu' => $request->dospem1,
            'pembimbing_dua' => $request->dospem2,
            'judul_skripsi' => $request->judul,

        ]);

        echo json_encode(["status" => TRUE]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KerjaPraktek;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DaftarKpController extends Controller
{
    public function index()
    {
        $datakp = KerjaPraktek::where('nama_lengkap', Auth::user()->name)->first();
        $user = User::role('dosen')->get();
        return view('mahasiswa.daftar_sidang.kp.index', compact('user', 'datakp'));
    }

    public function simpankp(Request $request)
    {

        $file = $request->file_kp;
        $new_file  = time() . $file->getClientOriginalName();
        $request->validate([
            'dospemkp' => 'required',
        ], [
            'dospemkp.required' => "Pilih Dosen Pembimbing Kerja Praktek!!"
        ]);

        KerjaPraktek::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'pembimbing' => $request->pembimbing,
            'judul_kp' => $request->judul_kp,
            'file_kp' => '/uploads/kp/' . $new_file
        ]);
        $file->move('/uploads/kp/', $new_file);

        echo json_encode(["status" => TRUE]);
    }
}
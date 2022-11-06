<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DaftarSkripsi;
use Illuminate\Support\Facades\Auth;

class DaftarSkripsiController extends Controller
{
    public function index()
    {
        $data = DaftarSkripsi::where('nama_lengkap', Auth::id())->first();
        $user = User::role('dosen')->get();
        return view('mahasiswa.daftar_sidang.skripsi.index', compact('user', 'data'));
    }

    public function simpansk(Request $request)
    {
        // $request->validate([
        //     'dospem1' => 'required',
        //     'dospem2' => 'required|different:dospem1',
        // ], [
        //     'different' => 'Pembimbing Tidak Boleh Sama!!',
        //     'dospem1.required' => 'Pilih Dosen Pembimbing!!',
        //     'dospem2.required' => 'Pilih Dosen Pembimbing!!',
        // ]);

        DaftarSkripsi::create([
            'nim' => $request->nim,
            'nama_lengkap' => Auth::id(),
            'pembimbing_satu' => $request->pembimbing_satu,
            'pembimbing_dua' => $request->pembimbing_dua,
            'judul_skripsi' => $request->judul
        ]);

        $user = User::where('id', Auth::id());

        $user->update([
            'pembimbing_satu' => $request->pembimbing_satu,
            'pembimbing_dua' => $request->pembimbing_dua,
        ]);

        echo json_encode(["status" => TRUE]);
    }
}
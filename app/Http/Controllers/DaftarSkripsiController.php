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
        $request->validate([
            'pembimbing_satu' => 'required|different:pembimbing_dua',
            'pembimbing_dua' => 'required|different:pembimbing_satu',
            'judul' => 'required',
        ], [
            'different' => 'Pembimbing Tidak Boleh Sama!!',
            'pembimbing_satu.required' => 'Pilih Dosen Pembimbing!!',
            'pembimbing_dua.required' => 'Pilih Dosen Pembimbing!!',
            'judul.required' => 'Masukkan Judul Skripsi!!',
        ]);

        DaftarSkripsi::create([
            'nim' => $request->nim,
            'nama_lengkap' => Auth::id(),
            'pembimbing_satu' => $request->pembimbing_satu,
            'pembimbing_dua' => $request->pembimbing_dua,
            'judul_skripsi' => $request->judul,
            'jenis_sidang' => 'skripsi',
        ]);

        $user = User::where('id', Auth::id());

        echo json_encode(["status" => TRUE]);
    }
}
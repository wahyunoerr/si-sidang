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
        $datakp = KerjaPraktek::where('nama_lengkap', Auth::id())->first();
        $user = User::role('dosen')->get();
        return view('mahasiswa.daftar_sidang.kp.index', compact('user', 'datakp'));
    }

    public function simpankp(Request $request)
    {

        $file = $request->file_kp;
        $foto = $request->foto_transaksi;
        $new_file  = time() . $file->getClientOriginalName();
        $new_foto = time() . $foto->getClientOriginalName();
        $request->validate([
            'dospemkp' => 'required',
            'foto_transaksi' => 'required'
        ], [
            'dospemkp.required' => "Pilih Dosen Pembimbing Kerja Praktek!!",
            'foto_transaksi.required' => "images|mimes:jpeg,png|max:2048"
        ]);

        KerjaPraktek::create([
            'nim' => $request->nim,
            'nama_lengkap' => Auth::id(),
            'pembimbing' => $request->dospemkp,
            'judul_kp' => $request->judul,
            'file_kp' => '/uploads/kp/' . $new_file,
            'foto_transaksi' => '/uploads/kp/bukti_transaksi' . $new_foto,
        ]);
        // $user = User::where('id', Auth::id());
        // $user->update([
        //     'pembimbing' => $request->pembimbing,
        // ]);
        $file->move('/uploads/kp/', $new_file);
        $foto->move('/uploads/kp/bukti_transaksi', $new_foto);

        echo json_encode(["status" => TRUE]);
    }
}
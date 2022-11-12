<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DaftarSkripsi;
use App\Models\Sempro;
use Illuminate\Support\Facades\Auth;
use DB;

class DaftarProposalController extends Controller
{
    public function create()
    {
        $pemb = DaftarSkripsi::where('nama_lengkap', Auth::id())->first();
        $data = Sempro::where('nama_lengkap', Auth::id())->first();
        $dosen = User::role('dosen')->get();
        return view('mahasiswa.daftar_sidang.sempro.index', compact('dosen', 'pemb', 'data'));
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'file_proposal' => 'required|mimes:pdf'
        // ], [
        //     'file_proposal.required' => 'Masukkan File Proposal Anda',
        //     'mimes' => 'File Harus Berbentuk .pdf'
        // ]);

        $file = $request->file('file_proposal');
        $new_file = time() . $file->getClientOriginalName();
        $pemb = DaftarSkripsi::where('nama_lengkap', Auth::id())->first();

        Sempro::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'pembimbing_satu' => $pemb->pembimbing_satu,
            'pembimbing_dua' => $pemb->pembimbing_dua,
            'judul_proposal' => $pemb->judul_skripsi,
            'file_proposal' => '/uploads/proposal/' . $new_file,
            'jenis_sidang' => 'proposal'
        ]);

        $file->move('/uploads/proposal/', $new_file);

        echo json_encode(["status" => TRUE]);
    }
}
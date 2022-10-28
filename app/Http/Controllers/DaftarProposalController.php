<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DaftarSkripsi;
use App\Models\Sempro;
use Auth;
use DB;

class DaftarProposalController extends Controller
{
    public function create()
    {
        $pemb = DaftarSkripsi::where('nama_lengkap', Auth::user()->name)->first();
        $daf = Sempro::where('nama_lengkap', Auth::user()->name)->first();
        $user = DB::table('tbl_daftar_skripsi')
            ->leftjoin('users as dospem1', 'dospem1.id', 'tbl_daftar_skripsi.pembimbing_satu')
            ->leftjoin('users as dospem2', 'dospem2.id', 'tbl_daftar_skripsi.pembimbing_dua')
            ->where('tbl_daftar_skripsi.nama_lengkap', Auth::user()->name)
            ->select('tbl_daftar_skripsi.*', 'dospem1.name as pemb_1', 'dospem2.name as pemb_2')
            ->first();

        return view('mahasiswa.daftar_sidang.sempro.index', compact('user', 'pemb', 'daf'));
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'file_proposal' => 'required|mimes:pdf'
        // ], [
        //     'file_proposal.required' => 'Masukkan File Proposal Anda',
        //     'mimes' => 'File Harus Berbentuk .pdf'
        // ]);

        $file = $request->file_proposal;
        $new_file = time() . $file->getClientOriginalName();

        Sempro::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'pembimbing_satu' => $request->pembimbing_satu,
            'pembimbing_dua' => $request->pembimbing_dua,
            'judul_proposal' => $request->judul_proposal,
            'file_proposal' => '/uploads/proposal/' . $new_file
        ]);

        $file->move('/uploads/proposal/', $new_file);

        echo json_encode(["status" => TRUE]);
    }
}
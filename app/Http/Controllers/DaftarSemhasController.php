<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Semhas;
use App\Models\DaftarSkripsi;
use DB;

class DaftarSemhasController extends Controller
{
    public function create()
    {
        $data =  DaftarSkripsi::where('nama_lengkap', Auth::user()->name)->first();
        $user = DB::table('tbl_daftar_skripsi')
            ->leftjoin('users as dospem1', 'dospem1.id', 'tbl_daftar_skripsi.pembimbing_satu')
            ->leftjoin('users as dospem2', 'dospem2.id', 'tbl_daftar_skripsi.pembimbing_dua')
            ->where('tbl_daftar_skripsi.nama_lengkap', Auth::user()->name)
            ->select('tbl_daftar_skripsi.*', 'dospem1.name as pemb_1', 'dospem2.name as pemb_2')
            ->first();
        return view('mahasiswa.daftar_sidang.semhas.index', compact('data', 'user'));
    }


    public function store(Request $request)
    {


        $file = $request->file_skripsi;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('/uploads/file_skripsi/', $new_file);

        Semhas::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'pembimbing_satu' => $request->pembimbing_satu,
            'pembimbing_dua' => $request->pembimbing_dua,
            'judul_skripsi' => $request->file_skripsi,
            'file_skripsi' => '/uploads/file_skripsi/' . $new_file
        ]);




        echo json_encode(["status" => TRUE]);
    }
}

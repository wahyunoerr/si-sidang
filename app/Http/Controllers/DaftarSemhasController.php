<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Semhas;
use App\Models\Sempro;
use DB;

class DaftarSemhasController extends Controller
{
    public function create()
    {
        $data2 =  Sempro::where('nama_lengkap', Auth::user()->name)->get();
        $data =  Sempro::where('nama_lengkap', Auth::user()->name)->first();
        $semhas = Semhas::where('nama_lengkap', Auth::user()->name)->first();
        $user = DB::table('tbl_daftar_skripsi')
            ->leftjoin('users as dospem1', 'dospem1.id', 'tbl_daftar_skripsi.pembimbing_satu')
            ->leftjoin('users as dospem2', 'dospem2.id', 'tbl_daftar_skripsi.pembimbing_dua')
            ->where('tbl_daftar_skripsi.nama_lengkap', Auth::user()->name)
            ->select('tbl_daftar_skripsi.*', 'dospem1.name as pemb_1', 'dospem2.name as pemb_2')
            ->first();
        return view('mahasiswa.daftar_sidang.semhas.index', compact('data', 'user', 'data2', 'semhas'));
    }


    public function revisi($id)
    {
        $data = Sempro::findorfail($id);
        return view('mahasiswa.daftar_sidang.semhas.filerevisi', compact('data'));
    }

    public function storeRevisi(Request $request, $id)
    {
        if ($request->has('file_skripsi_revisi')) {
            $file = $request->file_skripsi_revisi;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/file_skripsi_revisi/', $new_file);
        }

        $data = Sempro::findOrFail($id);

        $data->file_skripsi_revisi = $request->file_skripsi_revisi != '' ? $new_file : $data->file_skripsi_revisi;
        $data->save();

        echo json_encode(["status" => TRUE]);
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
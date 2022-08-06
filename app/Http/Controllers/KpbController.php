<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KP;


class KpbController extends Controller
{
    public function index(){
        $mhs = User::role('mahasiswa')->get();
        $dosen = User::role('dosen')->get();
        return view('admin.kerjapraktekb.index', compact('mhs','dosen'));
    }


    public function simpan(Request $request){
        $request->validate([
            'nama_mahasiswa' => 'required|unique:tbl_kp',
            'dosbing_satu' => 'required|different:dosbing_dua',
            'dosbing_dua' => 'required|unique:tbl_kp,dosbing_satu',
        ]);

        KP::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'dosbing_satu' => $request->dosbing_satu,
            'dosbing_dua' => $request->dosbing_dua
        ]);

        echo json_encode(["status" => TRUE]);
    }
}
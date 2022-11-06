<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DaftarSkripsi;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PendaftarController extends Controller
{
    public function index(){
        $data = DB::table('tbl_daftar_skripsi')
        ->join('users','users.id','tbl_daftar_skripsi.nama_lengkap')
        ->select('tbl_daftar_skripsi.*','users.name')
        ->get();
        if (Request()->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" title="Lihat Selengkapnya" class="detail btn btn-info btn-sm" onclick="getInfo(' . "'" . $row->id . "'" . ')"><i class="fas fa-eye"></i></a> ';
                    return $btn;
                })
                ->rawColumns(['status_lulus', 'action'])
                ->make(true);
        }
        return view('admin.pendaftar.index');
    }
    

    public function getInfo($id){
      $data = DB::table('tbl_daftar_skripsi')
      ->join('users as dospem1', 'dospem1.id', 'tbl_daftar_skripsi.pembimbing_satu')
      ->join('users as dospem2', 'dospem2.id', 'tbl_daftar_skripsi.pembimbing_dua')
      ->where('tbl_daftar_skripsi.id', $id)
      ->select('tbl_daftar_skripsi.*', 'dospem1.name as pemb_1', 'dospem2.name as pemb_2')
      ->first();

      echo json_encode($data);    
    }
}

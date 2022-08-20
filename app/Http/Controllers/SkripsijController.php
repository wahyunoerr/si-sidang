<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sempro;
use App\Models\User;
use Auth;
use DataTables;


class SkripsijController extends Controller
{
    public function index(){
        $data = Sempro::orderBy('id', 'DESC')->get();
        if (Request()->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="'.url('kaprodi/manajemen-jadwal/proposal/lihat-file', $row->id).'" title="Lihat File Proposal" class="edit btn btn-warning btn-sm"><i class="fas fa-file"></i></a>';
 
                $btn = $btn.' <a href="javascript:void(0)" title="Lihat Detail" class="btn btn-info btn-sm" onclick="get('."'".$row->id."'".')"><i class="fas fa-eye"></i></a>';
 
                return $btn;
            })
             ->rawColumns(['foto', 'action'])
             ->make(true);
        }

        return view('kaprodi.proposal.index');
    }

    public function lihatFile($id){
        $data = Sempro::findorfail($id);
        return view('kaprodi.proposal.lihatfile', compact('data'));
    }
    

    public function edit($id){
        $data = Sempro::findorfail($id);

        echo json_encode($data);
    }

    public function buatJadwal(){
        $nouser = "001";
        $tanggal = "SIUMRI" . date('YmdHis') . $nouser;
        $sempro = Sempro::all();
        $dosen = User::role('dosen')->get();
        return view('kaprodi.proposal.buat-jadwal',compact('tanggal','sempro','dosen'));
    }


}
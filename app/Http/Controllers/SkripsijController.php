<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sempro;
use App\Models\Waktu;
use Auth;
use DataTables;

class SkripsijController extends Controller
{
    public function index(){
        $waktu = Waktu::all();
        $data = Sempro::orderBy('id', 'DESC');
        if (Request()->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="'.url('kaprodi/manajemen-jadwal/proposal/lihat-file', $row->id).'" title="Lihat File Proposal" class="edit btn btn-warning btn-sm"><i class="fas fa-file"></i></a>';
 
                $btn = $btn.' <a href="javascript:void(0)" title="Lihat Detail" class="btn btn-info btn-sm" onclick="get('."'".$row->id."'".')"><i class="fas fa-eye"></i></a>';
                $btn = $btn.' <a href="javascript:void(0)" title="Buat Jadwal" class="btn btn-primary btn-sm" onclick="buatJadwal('."'".$row->id."'".')"><i class="fas fa-calendar"></i></a>';
 
                return $btn;
            })
             ->rawColumns(['foto', 'action'])
             ->make(true);
        }

        return view('kaprodi.proposal.index', compact('waktu'));
    }

    public function lihatFile($id){
        $data = Sempro::findorfail($id);
        return view('kaprodi.proposal.lihatfile', compact('data'));
    }
    

    public function edit($id){
        $data = Sempro::findorfail($id);

        echo json_encode($data);
    }

    public function buatJadwal($id){
        $data = Sempro::findorfail($id);

       echo json_encode($data);
    }

    public function simpanJadwal(Request $request,$id){
        // $request->validate([
        //     'waktuMulai' => 'required',
        //     'waktuSelesai' => 'required|different:waktu_mulai',
        //     'tanggal' => 'required'
        // ]);

        $data = Sempro::findorfail($id);

        $data->waktu_mulai = $request->waktuMulai;
        $data->waktu_selesai = $request->waktuSelesai;
        $data->tanggal = $request->tanggal;
        $data->save();


       echo json_encode(["status" => TRUE]);
    }


}
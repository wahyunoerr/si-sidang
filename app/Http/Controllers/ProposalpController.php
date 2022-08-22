<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sempro;
use Auth;
use DataTables;
use DB;

class ProposalpController extends Controller
{
    public function index(){
        $data = DB::table('table_sidang_proposal')
                ->join('users as penguji_1','penguji_1.id','table_sidang_proposal.penguji_1')
                ->where('penguji_1', Auth::id())
                ->select('table_sidang_proposal.*','penguji_1.name as penguji1')->get();
        if (Request()->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status_lulus', function($tam){
                if ($tam->status_proposal == 1) {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-primary btn-sm" onclick="updatePenguji1('."'".$tam->id."'".')">Lulus</a>';
                } else {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-danger btn-sm" onclick="updatePenguji1('."'".$tam->id."'".')"> Tidak Lulus</a>';
                }

                return $btn1;
            })
            ->addColumn('action', function($row){

               $btn = '<a href="javascript:void(0)" title="Lihat Selengkapnya" class="detail btn btn-info btn-sm" onclick="getInfo('."'".$row->id."'".')"><i class="fas fa-eye"></i></a> ';
               $btn =  $btn.'<a href="javascript:void(0)" title="Catatan Revisi" class="detail btn btn-danger btn-sm" onclick="catRevisi('."'".$row->id."'".')"><i class="fas fa-edit"></i></a>';
               return $btn;
           })
            ->rawColumns(['status_lulus','action'])
            ->make(true);
        }

        return view('dosen.penguji.penguji1');
    }

    public function index2(){
        $data = DB::table('table_sidang_proposal')
                ->join('users as ketua_sidang','ketua_sidang.id','table_sidang_proposal.ketua_sidang')
                ->where('ketua_sidang', Auth::id())
                ->select('table_sidang_proposal.*','ketua_sidang.name as ketua_sidang')->get();
        if (Request()->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status_lulus', function($tam){
                if ($tam->status_proposal == 1) {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-primary btn-sm" onclick="updatePenguji1('."'".$tam->id."'".')">Lulus</a>';
                } else {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-danger btn-sm" onclick="updatePenguji1('."'".$tam->id."'".')"> Tidak Lulus</a>';
                }

                return $btn1;
            })
            ->addColumn('action', function($row){

               $btn = '<a href="javascript:void(0)" title="Edit" class="detail btn btn-info btn-sm" onclick="getInfo('."'".$row->id."'".')"><i class="fas fa-eye"></i></a>';

               return $btn;
           })
            ->rawColumns(['status_lulus','action'])
            ->make(true);
        }

        return view('dosen.penguji.ketuasidang');
    }

    public function index3(){
        $data = DB::table('table_sidang_proposal')
                ->join('users as penguji_2','penguji_2.id','table_sidang_proposal.ketua_sidang')
                ->where('penguji_2', Auth::id())
                ->select('table_sidang_proposal.*','penguji_2.name as penguji2')->get();
        if (Request()->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status_lulus', function($tam){
                if ($tam->status_proposal == 1) {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-primary btn-sm" onclick="updatePenguji1('."'".$tam->id."'".')">Lulus</a>';
                } else {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-danger btn-sm" onclick="updatePenguji1('."'".$tam->id."'".')"> Tidak Lulus</a>';
                }

                return $btn1;
            })
            ->addColumn('action', function($row){

               $btn = '<a href="javascript:void(0)" title="Edit" class="detail btn btn-info btn-sm" onclick="getInfo('."'".$row->id."'".')"><i class="fas fa-eye"></i></a> ';
               $btn =  $btn.'<a href="javascript:void(0)" title="Catatan Revisi" class="detail btn btn-danger btn-sm" onclick="catRevisi2('."'".$row->id."'".')"><i class="fas fa-edit"></i></a>';
               return $btn;
           })
            ->rawColumns(['status_lulus','action'])
            ->make(true);
        }

        return view('dosen.penguji.penguji2');
    }


    public function infoPenguji1($id){
        $data = DB::table('table_sidang_proposal')
                ->join('users as peng_1','peng_1.id','table_sidang_proposal.penguji_1')
                ->join('users as ket_sidang','ket_sidang.id','table_sidang_proposal.ketua_sidang')
                ->join('users as peng_2','peng_2.id','table_sidang_proposal.penguji_2')
                ->where('table_sidang_proposal.id', $id)
                ->select('table_sidang_proposal.*','peng_1.name as penguji1','peng_2.name as penguji2','ket_sidang.name as ketuasidang')->first();
        echo json_encode($data);
    }

    public function updatePenguji1(Request $request,$id){
        $data = Sempro::findorfail($id);

        $update = [
            'status_proposal' => $data->status_proposal == 0 ? 1 : 0
        ];

        Sempro::whereId($id)->update($update);

        echo json_encode(["status" => TRUE]);
        
    }

    public function getRevisi($id){
        $data = Sempro::findorfail($id);

        echo json_encode($data);
    }

    public function simpanRevisi1(Request $request, $id){
        
        $request->validate([
            'catatan_revisi' => 'required'
        ]);


        
        $data = Sempro::findorfail($id);
        $data->catatan_revisi = $request->catatan_revisi;
        $data->save();

        echo json_encode(["status" => TRUE]);
    }

    public function getRevisi2($id){
        $data = Sempro::findorfail($id);

        echo json_encode($data);
    }

    public function simpanRevisi2(Request $request, $id){
        
    


    
        $data = Sempro::findorfail($id);
        $data->catatan_revisi2 = $request->catatan_revisi2;
        $data->save();

        echo json_encode(["status" => TRUE]);
    }
    
}
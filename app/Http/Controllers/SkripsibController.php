<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarSkripsi;
use App\Models\User;
use Auth;
use DataTables;


class SkripsibController extends Controller
{
    public function indexDospem1(){
        $sk = DaftarSkripsi::where('pembimbing_satu', Auth::id())->get();
        if (Request()->ajax()) {
            return Datatables::of($sk)
            ->addIndexColumn()
            ->addColumn('status', function($tam){
                if ($tam->status_proposal == 0) {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-warning btn-sm" onclick="update('."'".$tam->id."'".')">Pending</a>';
                } else if($tam->status_proposal == 1) {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-success btn-sm" onclick="update('."'".$tam->id."'".')">Accepted</a>';
                }

                return $btn1;
            })
            ->rawColumns(['status'])
            ->make(true);
        }
        return view('admin.skripsib.dospem1');
    }

    public function indexDospem2(){
        $sk2 = DaftarSkripsi::where('pembimbing_dua', Auth::id())->get();
        if (Request()->ajax()) {
            return Datatables::of($sk2)
            ->addIndexColumn()
            ->addColumn('status_bimbingan2', function($tam){
                if ($tam->status_bimbingan2 == 0) {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-warning btn-sm" onclick="update2('."'".$tam->id."'".')">Pending</a>';
                } else if($tam->status_bimbingan2 == 1) {
                    $btn1 = '<a href="javascript:void(0)" title="Edit" class="btn btn-success btn-sm" onclick="update2('."'".$tam->id."'".')">Accepted</a>';
                }

                return $btn1;
            })
            ->rawColumns(['status_bimbingan2'])
            ->make(true);
        }
        return view('admin.skripsib.dospem2');
    }


    public function update($id){
        $data = DaftarSkripsi::findOrFail($id);

        $update = [
            'status_proposal' => $data->status_proposal == 0 ? 1 : 0
        ];

        DaftarSkripsi::whereId($id)->update($update);

        echo json_encode(["status" => TRUE]);
    }

    
    public function update2($id){
        $data = DaftarSkripsi::findOrFail($id);
        

        $update = [
            'status_bimbingan2' => $data->status_bimbingan2 == 0 ? 1 : 0
        ]; 

        DaftarSkripsi::whereId($id)->update($update);

        echo json_encode(["status" => TRUE]);
    }
}
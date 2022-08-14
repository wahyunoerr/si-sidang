<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarSkripsi;
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
        return view('admin.skripsib.index');
    }


    public function update($id){
        $data = DaftarSkripsi::findOrFail($id);

        $update = [
            'status_proposal' => $data->status_proposal == 0 ? 1 : 0
        ];

        DaftarSkripsi::whereId($id)->update($update);

        echo json_encode(["status" => TRUE]);
    }
}
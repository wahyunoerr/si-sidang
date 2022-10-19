<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarSkripsi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DataTables;
use DB;


class SkripsibController extends Controller
{
    public function indexDospem1()
    {
        $sk = DaftarSkripsi::orWhere('pembimbing_satu', Auth::id())->orWhere('pembimbing_dua', Auth::id())->get();
        if (Request()->ajax()) {
                    return Datatables::of($sk)
                        ->addIndexColumn()
                        ->addColumn('status_bimbingan2', function ($tam) {
                            if ($tam->status_bimbingan2 == 0) {
                                $btn1 = '<a href="javascript:void(0)" title="Status" class="btn btn-warning btn-sm" onclick="update2(' . "'" . $tam->id . "'" . ')">Pending</a>';
                            } else if ($tam->status_bimbingan2 == 1) {
                                $btn1 = '<a href="javascript:void(0)" title="Status" class="btn btn-success btn-sm" onclick="update2(' . "'" . $tam->id . "'" . ')">Accepted</a>';
                            }
                            return $btn1;
                        })
                        ->rawColumns(['status_bimbingan2'])
                        ->make(true);
                }
        return view('admin.skripsib.dospem1', compact('sk'));
    }

    public function kaprodiacc(){
        $sk = DaftarSkripsi::all();
        if (Request()->ajax()) {
                    return Datatables::of($sk)
                        ->addIndexColumn()
                        ->addColumn('status_bimbingan2', function ($tam) {
                            if ($tam->status_bimbingan2 == 0) {
                                $btn1 = '<a href="javascript:void(0)" title="Status" class="btn btn-warning btn-sm" onclick="update2(' . "'" . $tam->id . "'" . ')">Pending</a>';
                            } else if ($tam->status_bimbingan2 == 1) {
                                $btn1 = '<a href="javascript:void(0)" title="Status" class="btn btn-success btn-sm" onclick="update2(' . "'" . $tam->id . "'" . ')">Accepted</a>';
                            }
                            return $btn1;
                        })
                        ->rawColumns(['status_bimbingan2'])
                        ->make(true);
                }
        return view('admin.skripsib.kaprodi', compact('sk'));
    }

    public function update($id)
    {
        $data = DaftarSkripsi::findOrFail($id);

        $update = [
            'status_proposal' => $data->status_proposal == 0 ? 1 : 0
        ];

        DaftarSkripsi::whereId($id)->update($update);

        echo json_encode(["status" => TRUE]);
    }


    public function update2($id)
    {
        $data = DaftarSkripsi::findOrFail($id);


        $update = [
            'status_bimbingan2' => $data->status_bimbingan2 == 0 ? 1 : 0
        ];

        DaftarSkripsi::whereId($id)->update($update);

        echo json_encode(["status" => TRUE]);
    }
}
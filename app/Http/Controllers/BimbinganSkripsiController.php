<?php

namespace App\Http\Controllers;

use App\Models\DaftarSkripsi;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class BimbinganSkripsiController extends Controller
{
    public function indexDospem1()
    {
        $sk = DaftarSkripsi::orWhere('pembimbing_satu', Auth::id())->orWhere('pembimbing_dua', Auth::id())->get();
        if (Request()->ajax()) {
            return Datatables::of($sk)
                ->addIndexColumn()
                ->addColumn('status_bimbingan2', function ($tam) {
                    if ($tam->status_bimbingan2 == 0) {
                        $btn1 = '<a href="javascript:void(0)" title="Status" class="btn btn-warning btn-sm" onclick="update2(' . "'" . $tam->id . "'" . ')">Menunggu</a>';
                    } else if ($tam->status_bimbingan2 == 1) {
                        $btn1 = '<a href="javascript:void(0)" title="Status" class="btn btn-success btn-sm" onclick="update2(' . "'" . $tam->id . "'" . ')">Diterima</a>';
                    }
                    return $btn1;
                })
                ->rawColumns(['status_bimbingan2'])
                ->make(true);
        }
        return view('admin.skripsib.dospem1', compact('sk'));
    }

    public function kaprodiacc()
    {
        $sk = DaftarSkripsi::all();
        // $data = DB::table('table_sidang_proposal')
        // ->join('users as nama_lengkap','nama_lengkap.id','table_sidang_proposal.nama_lengkap')
        // ->join('users as dospem1', 'dospem1.id','table_sidang_proposal.pembimbing_satu')
        // ->join('users as dospem2')
        // ->get();
        if (Request()->ajax()) {
            return Datatables::of($sk)
                ->addIndexColumn()
                ->addColumn('status_proposal', function ($tam) {
                    if ($tam->status_proposal == 0) {
                        $btn = '<a href="javascript:void(0)" title="Status" class="btn btn-warning btn-sm" onclick="update(' . "'" . $tam->id . "'" . ')">Menunggu</a>';
                    } else if ($tam->status_proposal == 1) {
                        $btn = '<a href="javascript:void(0)" title="Status" class="btn btn-success btn-sm" onclick="update(' . "'" . $tam->id . "'" . ')">Diterima</a>';
                    }
                    return $btn;
                })
                ->addColumn('status_bimbingan2', function ($tap) {
                    if ($tap->status_bimbingan2 == 0) {
                        $btn2 = '<a href="javascript:void(0)" title="Status" class="btn btn-warning btn-sm" onclick="update2(' . "'" . $tap->id . "'" . ')">Menunggu</a>';
                    } else if ($tap->status_bimbingan2 == 1) {
                        $btn2 = '<a href="javascript:void(0)" title="Status" class="btn btn-success btn-sm" onclick="update2(' . "'" . $tap->id . "'" . ')">Diterima</a>';
                    }
                    return $btn2;
                })
                ->rawColumns(['status_proposal', 'status_bimbingan2'])
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
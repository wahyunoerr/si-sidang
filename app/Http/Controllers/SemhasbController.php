<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\DaftarSemhas;


class SemhasbController extends Controller
{
    public function indexDospem1()
    {
        $sm = DaftarSemhas::orWhere('pembimbing_satu', Auth::id())->orWhere('pembimbing_dua', Auth::id())->get();
        if (Request()->ajax()) {
            return Datatables::of($sm)
                ->addIndexColoumn()
                ->addColoumn('status_bimbingan2', function ($sam) {
                    if ($sam->status_bimbingan2 == 0) {
                        $btn2 = '<a href="javascript::void(0)" title="Status"class="btn btn-warning btn-sm" onclick="update2(' . "'" . $sam->id . "'" . ')">Pending</a>';
                    } else if ($sam->status_bimbingan2 == 1) {
                        $btn2 = '<a href="javascript:void(0)" title="Status" class="btn btn-success btn-sm" onclick="update2(' . "'" . $sam->id . "'" . ')">Accepted</a>';
                    }
                    return $btn2;
                })
                ->rawColumns(['status_bimbingan2'])
                ->make(true);
        }
        return view('admin.semhasb.index', compact('sm'));
    }

    public function update($id)
    {
        $data = DaftarSemhas::findOrFail($id);


        $update = [
            'status_bimbingan2' => $data->status_bimbingan2 == 0 ? 1 : 0
        ];

        DaftarSemhas::whereId($id)->update($update);

        echo json_encode(["status" => TRUE]);
    }
}
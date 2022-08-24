<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sempro;
use App\Models\User;
use Auth;
use DataTables;
use PDF;
use DB;


class SemprojController extends Controller
{
    public function index()
    {
        $dosen = User::role('dosen')->get();
        $data = Sempro::where('tanggal_sidang', NULL)->get();
        if (Request()->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . url('kaprodi/manajemen-jadwal/proposal/lihat-file', $row->id) . '" title="Lihat File Proposal" class="edit btn btn-warning btn-sm"><i class="fas fa-file"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" title="Lihat Detail" class="btn btn-info btn-sm" onclick="get(' . "'" . $row->id . "'" . ')"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" title="Lihat Detail" class="btn btn-info btn-sm" onclick="getJadwal(' . "'" . $row->id . "'" . ')"><i class="fas fa-eye"></i></a>';

                    return $btn;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }

        return view('kaprodi.proposal.index', compact('dosen'));
    }

    public function lihatFile($id)
    {
        $data = Sempro::findorfail($id);
        return view('kaprodi.proposal.lihatfile', compact('data'));
    }


    public function edit($id)
    {
        $data = Sempro::findorfail($id);

        echo json_encode($data);
    }

    public function getJadwal($id)
    {
        $data =  Sempro::findorfail($id);
        echo json_encode($data);
    }



    public function simpanJadwal(Request $request, $id)
    {

        $request->validate([
            'tanggal_sidang' => 'required|after:today',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
            'ketua_sidang' => 'required|different:pembimbing_satu,pembimbing_dua,penguji_1,penguji_2',
            'penguji_1' =>  'required|different:pembimbing_satu,pembimbing_dua,penguji_2,ketua_sidang',
            'penguji_2' => 'required|different:pembimbing_satu,pembimbing_dua,penguji_1,ketua_sidang'
        ]);

        $data =  Sempro::findorfail($id);

        $data->tanggal_sidang = $request->tanggal_sidang;
        $data->waktu_mulai = $request->waktu_mulai;
        $data->waktu_selesai = $request->waktu_selesai;
        $data->ketua_sidang = $request->ketua_sidang;
        $data->penguji_1 = $request->penguji_1;
        $data->penguji_2 = $request->penguji_2;
        $data->save();

        echo json_encode(["status" => TRUE]);
    }

    public function lihatJadwal()
    {
        $data = Sempro::orderBy('id', 'DESC')->get();
        if (Request()->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = ' <a href="javascript:void(0)" title="Lihat Detail" class="btn btn-info btn-sm" onclick="detail(' . "'" . $row->id . "'" . ')"><i class="fas fa-eye"></i></a>';

                    return $btn;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }

        return view('kaprodi.proposal.lihat-jadwal');
    }

    public function printJadwal()
    {



        if (Sempro::whereNotNull('tanggal_sidang')) {
            $setPaper = array(0, 0, 1000, 1000);
            $data = DB::table('table_sidang_proposal')
                ->join('users as ketua_sidang', 'ketua_sidang.id', 'table_sidang_proposal.ketua_sidang')
                ->join('users as penguji_1', 'penguji_1.id', 'table_sidang_proposal.penguji_1')
                ->join('users as penguji_2', 'penguji_2.id', 'table_sidang_proposal.penguji_2')
                ->where('status_proposal', 0)
                ->select('table_sidang_proposal.*', 'ketua_sidang.name as ketuasidang', 'penguji_1.name as penguji1', 'penguji_2.name as penguji2')
                ->get();
            $pdf = PDF::loadview('kaprodi.proposal.jadwalpdf', compact('data'))->setPaper($setPaper);
            return $pdf->stream("jadwal-proposal.pdf", array("Attachment" => false));
        } else {
            echo "TIDAK ADA JADWAL YANG DIATUR.";
        }
    }
}

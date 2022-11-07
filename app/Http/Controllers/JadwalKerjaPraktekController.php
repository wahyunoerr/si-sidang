<?php

namespace App\Http\Controllers;

use App\Models\KerjaPraktek;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class JadwalKerjaPraktekController extends Controller
{
    public function index(){
        $data = DB::table('table_sidang_kp')
        ->join('users as nama_lengkap','nama_lengkap.id','table_sidang_kp.nama_lengkap')
        ->join('users as pembimbing','pembimbing.id','table_sidang_kp.pembimbing')
        ->where('tanggal_sidang', NULL)
        ->select('table_sidang_kp.*', 'nama_lengkap.name as nama_lengkap', 'pembimbing.name as pembimbing')
        ->get();
        if (Request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . url('kaprodi/manajemen-jadwal/kerja-praktek/lihat-file', $row->id) . '" title="Lihat File kerja praktek" class="edit btn btn-warning btn-sm"><i class="fas fa-file"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" title="Lihat Detail" class="btn btn-info btn-sm" onclick="get(' . "'" . $row->id . "'" . ')"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" title="Atur Jadwal" class="btn btn-success btn-sm" onclick="getJadwal(' . "'" . $row->id . "'" . ')"><i class="fas fa-calendar-times"></i></a>';

                    return $btn;;


                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kaprodi.kerjapraktek.index', compact('data'));
    }

    public function lihatFile($id)
    {
        $data = KerjaPraktek::findorfail($id);
        return view('kaprodi.kerjapraktek.lihatfile', compact('data'));
    }


    public function edit($id)
    {        
        $data = DB::table('table_sidang_kp')
        ->join('users as nama_lengkap','nama_lengkap.id','table_sidang_kp.nama_lengkap')
        ->join('users as pembimbing','pembimbing.id','table_sidang_kp.pembimbing')
        ->where('table_sidang_kp.id', $id)
        ->select('table_sidang_kp.*', 'nama_lengkap.name as nama_lengkap', 'pembimbing.name as pembimbing')
        ->first();

        echo json_encode($data);
    }

    public function getJadwal(Request $request)
    {
        $id = $request->id;
        $data =  KerjaPraktek::findorfail($id);
        $dosen = User::role('dosen')->get();

        return view('kaprodi.kerjapraktek.buat-jadwal', compact('data', 'dosen'));
    }

    public function simpanJadwal(Request $request, $id)
    {
        $request->validate([
            'tanggal_sidang' => 'required|after:today',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
            'ketua_sidang' => 'required|different:pembimbing_satu,pembimbing_dua,penguji_1,penguji_2',
            'penguji_1' =>  'required|different:pembimbing_satu,pembimbing_dua,penguji_2,ketua_sidang',
            'penguji_2' => 'required|unique:table_sidang_kp'
        ], [
            'tanggal_sidang.required' => 'Tidak Boleh Kosong',
            'waktu_mulai.required' => 'Tidak Boleh Kosong',
            'waktu_selesai.required' => 'Tidak Boleh Kosong',
            'ketua_sidang.required' => 'Tidak Boleh Kosong',
            'penguji_1.required' => 'Tidak Boleh Kosong',
            'penguji_2.required' => 'Tidak Boleh Kosong',
        ]);

        $data =  KerjaPraktek::findorfail($id);

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
        $data = DB::table('table_sidang_kp')
        ->join('users as nama_lengkap','nama_lengkap.id','table_sidang_kp.nama_lengkap')
        ->join('users as pembimbing','pembimbing.id','table_sidang_kp.pembimbing')
        ->select('table_sidang_kp.*', 'nama_lengkap.name as nama_lengkap', 'pembimbing.name as pembimbing')
        ->get();
        if (Request()->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = ' <a href="javascript:void(0)" title="Lihat Detail" class="btn btn-info btn-sm" onclick="detail(' . "'" . $row->id . "'" . ')"><i class="fas fa-eye"></i></a>';
                     $btn = $btn . '<a href="'.route('kp.edit', $row->id).'" title="Edit" class="edit btn btn-primary btn-sm" ><i class="fas fa-edit"></i></a>';

                    return $btn;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }

        return view('kaprodi.kerjapraktek.lihat-jadwal');
    }

    public function printJadwal()
    {
        if (KerjaPraktek::whereNotNull('tanggal_sidang')) {
            $setPaper = array(0, 0, 1000, 1000);
            $data = DB::table('table_sidang_kp')
                ->join('users as ketua_sidang', 'ketua_sidang.id', 'table_sidang_kp.ketua_sidang')
                ->join('users as penguji_1', 'penguji_1.id', 'table_sidang_kp.penguji_1')
                ->join('users as penguji_2', 'penguji_2.id', 'table_sidang_kp.penguji_2')
                ->where('status_kp', 0)
                ->select('table_sidang_kp.*', 'ketua_sidang.name as ketuasidang', 'penguji_1.name as penguji1', 'penguji_2.name as penguji2')
                ->get();
            $pdf = PDF::loadview('kaprodi.kerjapraktek.jadwalpdf', compact('data'))->setPaper($setPaper);
            return $pdf->stream("jadwal-kerjapraktek.pdf", array("Attachment" => false));
        } else {
            echo "TIDAK ADA JADWAL YANG DIATUR.";
        }
    }


    public function editJadwal($id){
        $data = DB::table('table_sidang_kp')->where('id', $id)->first();
        $dosen = User::role('dosen')->get();
        
        return view('kaprodi.kerjapraktek.edit', compact('data','dosen'));
    }

    public function updateJadwal(Request $request,$id ){

        $request->validate([
            'tanggal_sidang' => 'required|after:today',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
            'ketua_sidang' => 'required|different:pembimbing_satu,pembimbing_dua,penguji_1,penguji_2',
            'penguji_1' =>  'required|different:pembimbing_satu,pembimbing_dua,penguji_2,ketua_sidang',
            'penguji_2' => 'required|unique:table_sidang_kp'
        ], [
            'tanggal_sidang.required' => 'Tidak Boleh Kosong',
            'waktu_mulai.required' => 'Tidak Boleh Kosong',
            'waktu_selesai.required' => 'Tidak Boleh Kosong',
            'ketua_sidang.required' => 'Tidak Boleh Kosong',
            'penguji_1.required' => 'Tidak Boleh Kosong',
            'penguji_2.required' => 'Tidak Boleh Kosong',
        ]);

        $data = KerjaPraktek::findorfail($id);



        $data->tanggal_sidang = $request->tanggal_sidang;
        $data->waktu_mulai = $request->waktu_mulai;
        $data->waktu_selesai = $request->waktu_selesai;
        $data->penguji_1 = $request->penguji_1;
        $data->penguji_2 = $request->penguji_2;
        $data->ketua_sidang = $request->ketua_sidang;
        $data->save();


        echo json_encode(["status" => TRUE]);
    }

    public function detail($id){
        $data = DB::table('table_sidang_kp')
        ->join('users as nama_lengkap','nama_lengkap.id','table_sidang_kp.nama_lengkap')
        ->join('users as pembimbing','pembimbing.id','table_sidang_kp.pembimbing')
        ->join('users as penguji_1','penguji_1.id','table_sidang_kp.penguji_1')
        ->join('users as penguji_2','penguji_2.id','table_sidang_kp.penguji_2')
        ->join('users as ketua_sidang','ketua_sidang.id','table_sidang_kp.ketua_sidang')
        ->where('table_sidang_kp.id', $id)
        ->select('table_sidang_kp.*', 'nama_lengkap.name as nama_lengkap', 'pembimbing.name as pembimbing','penguji_1.name as penguji_1','penguji_2.name as penguji_2','ketua_sidang.name as ketua_sidang')
        ->first();

        echo json_encode($data);
    }
}

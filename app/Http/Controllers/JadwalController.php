<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{KerjaPraktek, Sempro, Semhas, User};
use Illuminate\Support\Js;

class JadwalController extends Controller
{
    public function index()
    {
        return view('kaprodi.jadwal.index');
    }

    public function getMahasiswa(Request $request)
    {
        $jenis = $request->jenis;
        $option = '<option value="">-- Pilih Mahasiswa --</option>';

        if ($jenis == 'KP') {
            $data = KerjaPraktek::select('table_sidang_kp.id', 'name')->join('users', 'users.id', '=', 'table_sidang_kp.nama_lengkap')->get();

            foreach ($data as $dt) {
                $option .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
            }
        } else if ($jenis == 'Sempro') {
            $data = Sempro::select('table_sidang_proposal.id', 'name')->join('users', 'users.id', '=', 'table_sidang_proposal.nama_lengkap')->get();

            foreach ($data as $dt) {
                $option .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
            }
        } else {
            $data = Semhas::select('table_sidang_semhas.id', 'name')->join('users', 'users.id', '=', 'table_sidang_semhas.nama_lengkap')->get();

            foreach ($data as $dt) {
                $option .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
            }
        }

        echo $option;
    }

    public function getPembimbing(Request $request)
    {
        $nama = $request->nama;
        $jenis = $request->jenis;
        $dosen = User::role('dosen')->get();
        $penguji_1 = '<option value="">-- Pilih --</option>';
        $penguji_2 = '<option value="">-- Pilih --</option>';

        if ($jenis == 'KP') {
            $data = KerjaPraktek::findOrFail($nama);

            foreach ($dosen as $dt) {
                if ($dt->id != $data->pembimbing) {
                    $penguji_1 .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
                    $penguji_2 .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
                }
            }
        } else if ($jenis == 'Sempro') {
            $data = Sempro::select('table_sidang_proposal.id', 'name')->join('users', 'users.id', '=', 'table_sidang_proposal.nama_lengkap')->get();

            foreach ($data as $dt) {
                $penguji_1 .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
            }
        } else {
            $data = Semhas::select('table_sidang_semhas.id', 'name')->join('users', 'users.id', '=', 'table_sidang_semhas.nama_lengkap')->get();

            foreach ($data as $dt) {
                $penguji_1 .= '<option value="' . $dt->id . '">' . $dt->name . '</option>';
            }
        }

        $res = [
            $penguji_1 => $penguji_1,
            $penguji_2 => $penguji_2
        ];

        echo json_encode($res);
    }
}
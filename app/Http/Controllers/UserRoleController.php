<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserRoleController extends Controller
{
    public function index(){
        $data = User::select(['id', 'name', 'email','serial_user','username'])->with('roles');
        if (Request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" title="Edit" class="btn btn-primary btn-sm" onclick="get(' . "'" . $row->id . "'" . ')">Edit</a>';
                    $btn = $btn . '<a href="javascript:void(0)" title="Edit" class="btn btn-info btn-sm" onclick="show(' . "'" . $row->id . "'" . ')">Hapus</a>';


                    return $btn;
                })
                ->addColumn('role', function ($data) {
                    return ucfirst($data->roles->first()->name);
                })

                ->rawColumns(['action',])
                ->make(true);
        }
        return view('admin.user-role.index');
    }



}

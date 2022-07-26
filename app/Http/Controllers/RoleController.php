<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;

class RoleController extends Controller
{
    public function index(){
        $data = Role::all();
        if (Request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" title="Edit" class="btn btn-primary btn-sm" onclick="get(' . "'" . $row->id . "'" . ')">Edit</a>';
                    $btn = $btn . '<a href="javascript:void(0)" title="Edit" class="btn btn-info btn-sm" onclick="show(' . "'" . $row->id . "'" . ')">Hapus</a>';


                    return $btn;
                })

                ->rawColumns(['action',])
                ->make(true);
        }
        return view('admin.role.index');
    }
}

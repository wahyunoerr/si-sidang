<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index(){
        return view('admin.user.profil');
    }

    public function editprofil(){
        $data = Auth::user();
        return view('admin.user.update-profil', compact('data'));
    }

    public function updateprofil(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'serial_user' => 'required|numeric',
            'no_telp' => 'required|numeric'
        ]);

        if ($request->foto != '') {
            $foto = $request->foto;
            $new_foto = time() . $foto->getClientOriginalName();
            $foto->move('uploads/user/', $new_foto);
            $data = Auth::user();

            $user_data['foto'] = 'uploads/user/' . $new_foto;
            User::whereId($id)->update($user_data);
            // unlink($data->foto);
        }

        $user_data = [
            'name' => $request->name,
            'serial_user' => $request->serial_user,
            'no_telp' => $request->no_telp,
        ];


        User::whereId($id)->update($user_data);
        echo json_encode(["status" => TRUE]);
    }

}

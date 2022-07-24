<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth, Hash;

class UserController extends Controller
{
    public function index(){
        $data = Auth::user();
        return view('admin.user.profil', compact('data'));
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

            if($data->foto){
             unlink($data->foto);
            }
        }

        $user_data = [
            'name' => $request->name,
            'serial_user' => $request->serial_user,
            'no_telp' => $request->no_telp,
        ];


        User::whereId($id)->update($user_data);
        echo json_encode(["status" => TRUE]);
    }


    public function updateEmail(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password_sekarang' => 'password|required'
        ]);

        $data_email = [
            'email' => $request->email
        ];


        User::whereId(Auth::user()->id)->update($data_email);
        echo json_encode(["status" => TRUE]);
    }

    public function ubah_password(Request $request){
        $request->validate([
            'pass_lama' => 'required|password',
            'pass_baru' => 'required|same:konf_pass{{ asset($data->foto) }}',
            'konf_pass' => 'required'
        ]);

        $data_password = [
            'password' => bcrypt($request->pass_conf)
        ];
        User::whereId(Auth::user()->id)->update($data_password);
        echo json_encode(["status" => TRUE]);

    }

}

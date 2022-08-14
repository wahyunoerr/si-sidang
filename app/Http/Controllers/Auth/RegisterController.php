<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'serial_user' =>['required', 'max:20', 'unique:users'],
            'email' => ['required', 'string','email', 'max:255', 'unique:users'],
            'no_telp' => ['required', 'max:21' ,'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'serial_user' => $data['serial_user'],
            'no_telp' => $data['no_telp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'foto' => 'https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png'
        ]);
        $user->assignRole('admin');
        return $user;

        echo json_encode(["status" => TRUE]);
    }
}
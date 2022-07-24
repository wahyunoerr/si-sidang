<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index(){
        return redirect('user/profil');
    }

    public function profil(){
    	$user = Auth::user();
    	return view('admin.user.profil', compact('user'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sempro;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if( Auth::check()){
        if ($data = Sempro::where('nama_lengkap', Auth::user()->name)->get()) {
            return view('home', compact('data'));
         }
     }else{
        return redirect('/');
     }
    }
}

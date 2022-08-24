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
        $data = Sempro::where('nama_lengkap', Auth::user()->name)->get();
        return view('home', compact('data'));
    }

    public function index2()
    {
        $data = Sempro::where('tanggal_sidang', Carbon::today()->toDateString())->get();
        return view('welcome', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sempro;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        $data = Sempro::where('tanggal_sidang', Carbon::today()->toDateString())->get();
        return view('welcome', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sempro;
use Illuminate\Support\Facades\Auth;


class SidangProposalController extends Controller
{
    public function indexPenguji1(){
        $data = Sempro::where('penguji_1', Auth::user()->name)->get();
        
    }
}
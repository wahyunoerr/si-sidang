<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SidangProposalController extends Controller
{
    public function indexPenguji1(){
        $data = Sempro::where('penguji_1', Auth::user()->name)->get();
        
    }
}
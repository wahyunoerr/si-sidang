<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkripsibController extends Controller
{
    public function index(){
        return view('admin.skripsib.index');
    }
}
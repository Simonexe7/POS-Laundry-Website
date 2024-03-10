<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    public function index(){
        return view('simulasi.index');
    }
    public function simulasiCucian(){
        return view('simulasiCucian.index');
    }
}

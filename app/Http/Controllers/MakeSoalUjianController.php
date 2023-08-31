<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeSoalUjianController extends Controller
{
    public function index(){
        return view('createsoal.buatsoalujian');
    }
}

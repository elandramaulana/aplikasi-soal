<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilAsesmenController extends Controller
{
    public function index(){
        return view('asesmen.index');
    }
}

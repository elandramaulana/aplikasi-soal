<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateSoalController extends Controller
{
    public function index(){
        return view('createsoal.index');
    }
}

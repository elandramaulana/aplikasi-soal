<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilAsesmenController extends Controller
{
    public function index(){
        $matkul = DB::table('matkul')->get();
        return view('asesmen.index',compact('matkul'));
    }
}

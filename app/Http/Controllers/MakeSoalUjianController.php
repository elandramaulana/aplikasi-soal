<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakeSoalUjianController extends Controller
{
    public function index($id){
        $cpmk = DB::table('cpmk')->where('matkul_id',$id)->get();
        return view('createsoal.buatsoalujian',compact('cpmk'));
    }
}

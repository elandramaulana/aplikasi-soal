<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCpmkController extends Controller
{
    public function index($id) {
        $matkul = DB::table('matkul')->where('id',$id)->get();
        return view('addcpmk.index',compact('matkul'));
    }
}

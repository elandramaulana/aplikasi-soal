<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddMatkulController extends Controller
{
    public function index() {
        return view('matkul.index');
    }
    public function store(Request $request)
    {
        $test = DB::table('matkul')->insert([
            'nama_matkul' => $request->nama_matkul,
            'kode_matkul' => $request->kode_matkul,
            'sks'=>$request->sks,
            'semester'=>$request->semester,
            'dosen'=>$request->dosen,
            'rubrik'=>$request->rubrik,
        ]);
//        dd($test);
        return redirect('/dashboard');
    }
    public function edit($id)
    {
        $matkul = DB::table('matkul')->where('id',$id)->get();
        return view('matkul.edit',['matkul'=>$matkul]);
    }
    public function update(Request $request)
    {
        $test = DB::table('matkul')->where('id',$request->id)->update([
            'nama_matkul' => $request->nama_matkul,
            'kode_matkul' => $request->kode_matkul,
            'sks'=>$request->sks,
            'semester'=>$request->semester,
            'dosen'=>$request->dosen,
            'rubrik'=>$request->rubrik
        ]);
//        dd($test);
        return redirect('/dashboard');
    }
    public function hapus($id)
    {
        DB::table('matkul')->where('id',$id)->delete();
        return redirect('/dashboard');
    }
}

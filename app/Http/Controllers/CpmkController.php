<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CpmkController extends Controller
{
    public function index($id) {
        $matkul = DB::table('matkul')->where('id',$id)->get();
        $cpmk = DB::table('cpmk')->where('matkul_id',$id)->get();
        return view('cpmk.index',compact('matkul'),compact('cpmk'));
    }
    public function store(Request $request)
    {
        $matkul_id = $request->matkul_id;
        DB::table('cpmk')->insert([
            'matkul_id' => $matkul_id,
            'cpmk' => $request->cpmk,
            'keterangan' => $request->keterangan,
            'remedial'=>$request->remedial,
            'persentase'=>$request->persentase,
        ]);
        return redirect()->route('getcpmk', ['id' => $matkul_id]);
    }
    public function edit($id)
    {
        $cpmk = DB::table('cpmk')->where('id',$id)->get();
        return view('cpmk.edit',['cpmk'=>$cpmk,'matkul']);
    }
    public function update(Request $request)
    {
        $matkul_id = $request->matkul_id;
        $test = DB::table('cpmk')->insert([
            'matkul_id' => $matkul_id,
            'cpmk' => $request->cpmk,
            'keterangan' => $request->keterangan,
            'remedial'=>$request->remedial,
        ]);
        dd($test);
//        return redirect('/
        return back();
    }
    public function hapus($id)
    {
        DB::table('cpmk')->where('id',$id)->delete();
        return back();
//        return redirect()->route('getcpmk', ['id' => $matkul_id]);
    }
}

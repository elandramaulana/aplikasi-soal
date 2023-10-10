<?php

namespace App\Http\Controllers;

use App\Models\Essay;
use App\Models\Objective;
use App\Models\PaketSoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{
    public function index($id){
        $paketSoal = PaketSoal::with('matkul')
            ->where('matkul_id', $id)
            ->get();
        $matkul_id = DB::table('paket_soal')->where('matkul_id',$id)->first();

        if ($paketSoal->isEmpty()) {
            return redirect()->back()->with('error', 'Paket soal tidak ditemukan');
        }

        // Inisialisasi array kosong untuk menyimpan data soal
        $objectiveSoal = [];
        $essaySoal = [];

        // Loop melalui setiap paket soal
        foreach ($paketSoal as $paket) {
            // Konversi JSON menjadi array
            $objectiveIds = json_decode($paket->objective_ids);
            $essayIds = json_decode($paket->essay_ids);

            // Ambil data soal berdasarkan ID yang ada dalam array dan tambahkan ke array yang sesuai
            $objectiveSoal = array_merge($objectiveSoal, Objective::whereIn('id', $objectiveIds)->get()->toArray());
            $essaySoal = array_merge($essaySoal, Essay::whereIn('id', $essayIds)->get()->toArray());
        }

        return view('ujian.index', compact('paketSoal', 'objectiveSoal', 'essaySoal','matkul_id'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Essay;
use App\Models\Objective;
use App\Models\PaketSoal;
use App\Models\UserEssay;
use App\Models\UserObjective;
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
    public function store(Request $request) {
        // Inisialisasi array untuk jawaban objektif dan esai
        $objectiveAnswers = [];
        $essayAnswers = [];

        // Loop melalui request data untuk memisahkan jawaban objektif dan esai
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'objective') === 0) {
                $questionId = str_replace('objective_ids', '', $key);
                $objectiveId = $request->input('objective_ids'.$questionId);
                $objectiveAnswers[$request->input('cpmk_id'.$questionId)][$objectiveId] = $value;
            } elseif (strpos($key, 'essay') === 0) {
                $questionId = str_replace('essay_ids', '', $key);
                $essayId = $request->input('essay_ids'.$questionId);
                $essayAnswers[$request->input('cpmk_id_essay'.$questionId)][$essayId] = $value;
            }
        }
var_dump($objectiveAnswers);
        // Simpan jawaban objektif dan esai sesuai dengan cpmk_id
        foreach ($objectiveAnswers as $cpmk_id => $answers) {
            foreach ($answers as $objectiveId => $value) {
                var_dump($value);
                $objectiveData = [
                    'cpmk_id' => $cpmk_id,
                    'objective_ids' => json_encode(array_keys($answers)),
                    'objective_answer' => json_encode(array_keys($value)),
                ];

                // Simpan jawaban objektif
                $userObjective = new UserObjective();
                $userObjective->fill($objectiveData);
                $userObjective->save();
            }
        }

        foreach ($essayAnswers as $cpmk_id => $answers) {
            $essayData = [
                'cpmk_id' => $cpmk_id,
                'essay_ids' => json_encode(array_keys($answers)),
                'essay_answer' => json_encode(array_values($answers)),
            ];

            // Simpan jawaban esai
            $userEssay = new UserEssay();
            $userEssay->fill($essayData);
            $userEssay->save();
        }

        // Tambahkan logika pengalihan atau pesan sukses sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Jawaban berhasil disimpan');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cpmk;
use App\Models\Objective;
use App\Models\Essay;
use App\Models\PaketSoal;

class GenerateSoalController extends Controller
{
    public function index(){
        $matkul = DB::table('matkul')->get();
        return view('createsoal.index',compact('matkul'));
    }
    public function generateRandomSoal($cpmkId, $objectiveCount, $essayCount)
    {
        // Temukan cpmk berdasarkan ID
        $cpmk = Cpmk::find($cpmkId);

        if (!$cpmk) {
            return null; // Cpmk dengan ID yang diberikan tidak ditemukan
        }

        // Mengambil soal objective secara acak
        $objectiveSoal = Objective::where('cpmk_id', $cpmkId)
            ->inRandomOrder()
            ->limit($objectiveCount)
            ->get();

        // Mengambil soal essay secara acak
        $essaySoal = Essay::where('cpmk_id', $cpmkId)
            ->inRandomOrder()
            ->limit($essayCount)
            ->get();

        // Menggabungkan soal objective dan essay menjadi satu paket soal
        $paketSoal = $objectiveSoal->concat($essaySoal);
        $objectiveIds = $objectiveSoal->pluck('id')->toArray();
        $essayIds = $essaySoal->pluck('id')->toArray();
        $objectiveIdsJson = json_encode($objectiveIds);
        $essayIdsJson = json_encode($essayIds);
        return [
            'paketSoal' => $paketSoal,
            'objectiveIds' => $objectiveIdsJson,
            'essayIds' => $essayIdsJson,
        ];
    }

    public function generatePaketSoal(Request $request)
    {
        $cpmkIds = $request->input('cpmk_id');
        $objectiveCounts = $request->input('objective_count');
        $essayCounts = $request->input('essay_count');

        // Lakukan validasi input sesuai kebutuhan, misalnya pastikan jumlah soal tidak melebihi yang tersedia

        foreach ($cpmkIds as $key => $cpmkId) {
            $objectiveCount = $objectiveCounts[$key] ?? 0;
            $essayCount = $essayCounts[$key] ?? 0;

            // Gunakan fungsi generateRandomSoal() untuk menghasilkan data soal
            $soalData = $this->generateRandomSoal($cpmkId, $objectiveCount, $essayCount);

            if (!$soalData) {
                return redirect()->back()->with('error', 'Cpmk tidak ditemukan');
            }

            // Buat paket soalData
            $paketSoalData = [
                'matkul_id' => Cpmk::find($cpmkId)->matkul_id,
                'cpmk_id' => $cpmkId,
                'time' => $request->input('time')
            ];

            // Hanya tambahkan array objective_ids jika count nya lebih dari 0
            if ($objectiveCount > 0) {
                $paketSoalData['objective_ids'] = $soalData['objectiveIds'];
            }

            // Hanya tambahkan array essay_ids jika count nya lebih dari 0
            if ($essayCount > 0) {
                $paketSoalData['essay_ids'] = $soalData['essayIds'];
            }

            // Simpan paket soal ke dalam tabel 'paket_soal' hanya jika ada data yang akan disimpan
            if (!empty($paketSoalData['objective_ids']) || !empty($paketSoalData['essay_ids'])) {
                PaketSoal::create($paketSoalData);
            }
        }

        return redirect()->route('generatesoal')->with('success', 'Paket soal berhasil di-generate');
    }
    public function showSoal($id){
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

        return view('createsoal.showsoal', compact('paketSoal', 'objectiveSoal', 'essaySoal','matkul_id'));
    }
    public function hapus($id)
    {
        DB::table('paket_soal')->where('matkul_id',$id)->delete();
//        return back();
        return redirect()->route('generatesoal');
    }
}

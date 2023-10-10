<?php

namespace Database\Seeders;

use App\Models\Matkul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = Matkul::all();

         foreach ($data as $item) {
             DB::table('matkul')->insert([
                 'nama_matkul' => $item->nama_matkul,
                 'kode_matkul' => $item->kode_matkul,
                 'sks' => $item->sks,
                 'semester' => $item->semester,
                 'dosen' => $item->dosen,
             ]);
         }
         dd($data);
    }
}

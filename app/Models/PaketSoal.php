<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketSoal extends Model
{
    use HasFactory;
    protected $table = 'paket_soal';
    protected $fillable = [
        'matkul_id',
        'cpmk_id',
        'objective_ids',
        'essay_ids',
        'time'
    ];

    public function cpmk()
    {
        return $this->belongsTo(Cpmk::class);
    }
    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }
}


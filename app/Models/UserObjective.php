<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserObjective extends Model
{
    use HasFactory;

    protected $table = 'user_objective';

    protected $fillable = [
        'user_id',
        'cpmk_id',
        'objective_ids',
        'objective_answer',
        'nilai',
    ];

    // Definisikan relasi ke model User jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definisikan relasi ke model Cpmk jika diperlukan
    public function cpmk()
    {
        return $this->belongsTo(Cpmk::class);
    }
}


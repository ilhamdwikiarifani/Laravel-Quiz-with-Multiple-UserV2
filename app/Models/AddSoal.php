<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSoal extends Model
{
    use HasFactory;


    protected $table = 'add_soals';

    protected $fillable = ['master_id', 'foto', 'soal', 'jawaban1', 'jawaban2', 'jawaban3', 'correctAnswer', 'evaluasi'];


    public function master()
    {
        return $this->belongsTo(Master::class, 'master_id', 'id');
    }
}

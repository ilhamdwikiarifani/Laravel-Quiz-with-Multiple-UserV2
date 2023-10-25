<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultExam extends Model
{
    use HasFactory;

    protected $table = 'result_exams';

    protected $fillable = ['user_id', 'kelas', 'matpel', 'benar', 'salah', 'overall', 'detail', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

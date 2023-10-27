<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResultExam extends Model
{
    use HasFactory;

    protected $table = 'result_exams';

    protected $fillable = ['user_id', 'kelas', 'matpel', 'benar', 'salah', 'overall', 'detail', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserExam extends Model
{
    use HasFactory;

    protected $table = 'user_exams';

    protected $fillable = ['user_id', 'master_id', 'master_join'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function master()
    {
        return $this->belongsTo(Master::class, 'master_id', 'id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }
}

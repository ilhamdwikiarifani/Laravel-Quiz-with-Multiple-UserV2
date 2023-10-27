<?php

namespace App\Models;

use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Master extends Model
{
    use HasFactory;

    protected $table = 'masters';

    protected $fillable  = ['kategori_id', 'title', 'status'];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }


    public function addsoal()
    {
        return $this->hasMany(AddSoal::class);
    }

    public function userexam()
    {
        return $this->hasMany(UserExam::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

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
}

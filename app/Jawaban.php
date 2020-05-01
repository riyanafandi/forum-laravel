<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = "jawaban";
    protected $fillable = ['jawaban', 'gambar', 'user_id', 'tugas_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}

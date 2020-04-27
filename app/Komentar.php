<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = "komentar";
    protected $fillable = ['isi', 'user_id', 'forum_id'];

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}

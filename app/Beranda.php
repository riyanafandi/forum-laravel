<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    //
    protected $table = "beranda";
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

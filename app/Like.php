<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = "like";
    protected $fillable = ['user_id', 'beranda_id'];

    public function beranda()
    {
        return $this->belongsTo(Beranda::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //
    protected $table = "mapel";
    protected $fillable = ['mapel', ];

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot(['nilai']);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}

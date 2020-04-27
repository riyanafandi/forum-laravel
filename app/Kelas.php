<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = "kelas";
    protected $fillable = ['nama', 'wali', 'ketua', 'kode'];

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class)->withPivot(['jam_ke']);
    }
}

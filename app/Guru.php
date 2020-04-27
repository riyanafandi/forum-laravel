<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $table = "guru";
    protected $fillable = ['nama', 'ttl', 'alamat', 'pelajaran_id'];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class)->withPivot(['jam_ke']);
    }

    public function mapel()
    {
        return $this->hasOne(Mapel::class);
    }
}

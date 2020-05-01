<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    //
    protected $table = "tugas";
    protected $fillable = ['deskripsi', 'kelas_id', 'mapel_id', 'guru_id', 'file'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}

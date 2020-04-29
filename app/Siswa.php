<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $fillable = ['agama', 'jenis_kelamin', 'alamat', 'ttl', 'nis', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

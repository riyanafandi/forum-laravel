<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'kelas_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }
    public function beranda()
    {
        return $this->hasMany(Beranda::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}

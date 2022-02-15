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
        'nama','level','username', 'password',
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

    public function karyawan()
    {
        return $this -> hasOne('App\Karyawan', 'karyawan_id');
    }

    public function mahasiswa()
    {
        return $this -> hasOne('App\Mahasiswa', 'mahasiswa_id');
    }

    public function log_book()
    {
        return $this->hasMany('App\LogBook', 'logbook_id');
    }

    public function informatika()
    {
        return $this->hasMany('App\Informatika', 'informatika_id');
    }

    public function informasi()
    {
        return $this->hasMany('App\Informasi', 'informasi_id');
    }

    public function persandian() {
        return $this->hasMany('App\Persandian', 'persandian_id');
    }
}

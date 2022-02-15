<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['user_id','nim','univ','email','noTelp','alamat','level'];
    protected $primaryKey = 'idMahasiswa';

    public function user() {
        return $this->belongsTo('App\User','user_id');
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

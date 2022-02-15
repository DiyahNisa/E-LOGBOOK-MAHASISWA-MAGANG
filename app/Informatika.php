<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informatika extends Model
{
    protected $fillable = ['user_id','kegiatanInformatika','tglInformatika','lokasiInformatika','buktiInformatika'];
    protected $primaryKey = 'idInformatika';

    // public function mahasiswa()
    // {
    //     return $this->belongsTo('App\Mahasiswa', 'mahasiswa_id');
    // }

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['user_id','nik','jabatan','noTelp','alamat'];
    protected $primaryKey = 'idKaryawan';


    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
}

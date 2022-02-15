<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $fillable = ['mahasiswa_id','kegiatanInformasi','tglInformasi','lokasiInformasi','buktiInformasi'];
    protected $primaryKey = 'idInformasi';

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'mahasiswa_id');
    }
}

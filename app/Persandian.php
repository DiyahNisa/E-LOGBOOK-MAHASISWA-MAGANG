<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persandian extends Model
{
    protected $fillable = ['mahasiswa_id','kegiatanPersandian','tglPersandian','lokasiPersandian','buktiPersandian'];
    protected $primaryKey = 'idPersandian';

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'mahasiswa_id');
    }
}

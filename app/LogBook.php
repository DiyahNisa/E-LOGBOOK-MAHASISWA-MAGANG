<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    protected $fillable = ['user_id','Kegiatan','tglKegiatan','lokasiKegiatan','buktiKegiatan'];
    protected $primaryKey = 'idLogBook';
    protected $dates = ['tglKegiatan'];

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
}

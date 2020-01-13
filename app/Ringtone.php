<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ringtone extends Model
{
    protected $table = 'ringtone';

    protected $primaryKey = 'id_ringtone';

    protected $fillable = ['nama_ringtone'];

    public function ringtone() {

        return $this->hasMany('App\jadwal');
    }
}

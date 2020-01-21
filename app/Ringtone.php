<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ringtone extends Model
{
    protected $table = 'ringtone';

    protected $primaryKey = 'id_ringtone';

    protected $fillable = ['nama_ringtone', 'nada_ringtone', 'path'];

    public function jadwal() {

        return $this->hasMany('App\Jadwal', 'id_ringtone');
    }
}

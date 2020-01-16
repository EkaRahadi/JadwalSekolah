<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ringtone extends Model
{
    protected $table = 'ringtone';

    protected $primaryKey = 'id_ringtone';

    public function jadwal() {

        return $this->hasMany('App\Jadwal', 'id_ringtone', 'id_jadwal');
    }
}

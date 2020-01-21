<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $primaryKey = 'id_jadwal';

    protected $fillable = ['id_hari', 'id_event', 'id_jam','id_kelas', 'id_ringtone'];

    public function hari() {

        return $this->belongsTo('App\Hari','id_hari');
    }

    public function event() {

        return $this->belongsTo('App\Event', 'id_event');
    }

    public function kelas() {

        return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function ringtone()
    {
        return $this->belongsTo('App\Ringtone', 'id_ringtone');
    }
}

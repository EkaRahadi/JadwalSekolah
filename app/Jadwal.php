<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $primaryKey = 'id_jadwal';

    protected $fillable = ['hari', 'event', 'jam','kelas', 'ringtone'];

    public function hari_jadwal() {

        return $this->belongsTo('App\Hari', 'id_jadwal','id_hari');
    }

    public function event_jadwal() {

        return $this->belongsTo('App\Event', 'id_jadwal', 'id_event');
    }

    public function kelas_jadwal() {

        return $this->belongsTo('App\Kelas', 'id_jadwal', 'id_kelas');
    }

    public function ringtone_jadwal()
    {
        return $this->belongsTo('App\Ringtone', 'id_jadwal', 'id_ringtone');
    }
}

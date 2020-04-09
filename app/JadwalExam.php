<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalExam extends Model
{
    protected $table = 'jadwal_exam';

    protected $primaryKey = 'id_jadwal_exam';

    protected $fillable = ['id_hari', 'id_event', 'id_ringtone', 'jam', 'gelombang'];

    public function hari() {
        return $this->belongsTo('App\Hari','id_hari');
    }

    public function event() {
        return $this->belongsTo('App\Event','id_event');
    }

    public function ringtone() {
        return $this->belongsTo('App\Ringtone','id_ringtone');
    }
}

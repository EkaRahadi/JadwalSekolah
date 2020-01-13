<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $primaryKey = 'id_jadwal';

    protected $fillable = ['hari', 'event', 'jam'];

    public function hari() {

        return $this->belongsTo('App\Hari');
    }

    public function event() {

        return $this->belongsTo('App\Event');
    }

    public function jam() {

        return $this->belongsTo('App\Jam');
    }

    public function kelas() {

        return $this->belongsTo('App\Kelas');
    }

    public function ringtone() {

        return $this->belongsTo('App\Ringtone');
    }
}

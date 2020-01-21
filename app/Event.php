<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $primaryKey = 'id_event';

    protected $fillable = ['event'];

    public function jadwal() {

        return $this->hasMany('App\Jadwal','id_event');
    }
}

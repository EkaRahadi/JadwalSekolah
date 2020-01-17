<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    protected $table = 'jam';

    protected $primaryKey = 'id_jam';

    protected $fillable = ['pukul'];

    public function jadwal() {

        return $this->hasMany('App\Jadwal', 'id_jadwal', 'id_jam');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = 'pelajaran';

    protected $primaryKey = 'id_pelajaran';

    protected $fillable = ['pelajaran'];

    public function jadwalPelajaran() {
        return $this->hasMany('App\JadwalPelajaran', 'id_pelajaran');
    }
}

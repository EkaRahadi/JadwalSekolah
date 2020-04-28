<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    protected $table = 'jadwal_pelajaran';

    protected $primaryKey = 'id_jadwal_pelajaran';

    protected $fillable = ['id_hari', 'id_kelas', 'id_pelajaran', 'jam'];

    public function hari() {
        return $this->belongsTo('App\Hari','id_hari');
    }

    public function kelas() {
        return $this->belongsTo('App\Kelas','id_kelas');
    }

    public function pelajaran() {
        return $this->belongsTo('App\Pelajaran','id_pelajaran');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPelajaran extends Model
{
    protected $table = 'detail_pelajaran';

    protected $primaryKey = 'id_detail_pelajaran';

    protected $fillable = ['id_jadwal_pelajaran', 'id_perlengkapan'];

    public function jadwalPelajaran() {
        return $this->belongsTo('App\JadwalPelajaran','id_jadwal_pelajaran');
    }

    public function perlengkapan() {
        return $this->belongsTo('App\Perlengkapan', 'id_perlengkapan');
    }
}
